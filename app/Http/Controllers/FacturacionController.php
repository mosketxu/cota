<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Facturaciones;
use App\Imports\FacturacionImport;
use App\Models\{Facturacion, Entidad};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use File;
use Excel;

// use Barryvdh\DomPDF\PDF;

class FacturacionController extends Controller
{

    public function index()
    {
        return view('facturacion.index');
    }

    public function create()
    {
        return view('facturacion.create');
    }


    public function show($entidadId)
    {
        $entidad=Entidad::find($entidadId);

        return view('facturacion.entidad',compact(['entidad']));
    }

    public function edit(Facturacion $facturacion)
    {
        return view('facturacion.edit',compact('facturacion'));
    }


    public function prefacturas(){
        return view('facturacion.prefacturas');
    }

    public function downfacturas()
    {

        $facturas=Facturacion::get();

        foreach ($facturas as $factura) {
            $this->downfacturapdf($factura);
        }

        $this->downloadZip();
    }


    public function imprimirfactura(Facturacion $factura)
    {

        $factura=Facturacion::with('entidad')
        ->with('facturadetalles')
        ->find($factura->id);

        $base=$factura->facturadetalles->where('iva', '!=', '0')->sum('base');
        $suplidos=$factura->facturadetalles->where('iva', '0')->sum('base');
        $totaliva=$factura->facturadetalles->sum('totaliva');
        $total=$factura->facturadetalles->sum('total');

        $ruta=$factura->serie.'/'.$factura->fechafactura->format('m');
        $fichero='Fra_Suma_'.$factura->serie.'_'.substr ( $factura->numfactura ,-5 ).'_'.substr ( $factura->entidad->entidad ,0,10 ) ;

        $pdf = \PDF::loadView('facturacion.facturapdf', compact(['factura','base','suplidos','totaliva','total']));

        Storage::put('public/facturas/'.$ruta.'/'.$fichero.'.pdf', $pdf->output());

        return $pdf->stream($fichero.'.pdf');
        // return $pdf->download($fichero.'.pdf');

        // redirect()->back();

    }

    public function downloadZip()
    {
        $zip = new ZipArchive;

        $fileName = 'myNewFile.zip';
        $ruta='storage/facturas/21/06/';
        // dd($fileName .'-'.$ruta);

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path($ruta));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }

    public function import()
    {

        Excel::import(new FacturacionImport, 'Facturas.xlsx');

        return redirect('/')->with('success', 'All good!');
    }

}
