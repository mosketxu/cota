<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Facturaciones;
use App\Models\{Facturacion, Entidad};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use File;

// use Barryvdh\DomPDF\PDF;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('facturacion.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facturacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($entidadId)
    {
        $entidad=Entidad::find($entidadId);

        return view('facturacion.entidad',compact(['entidad']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Facturacion $facturacion)
    {
        return view('facturacion.edit',compact('facturacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function prefacturas()
    {
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

    // public function downfacturapdf(Facturacion $factura)
    // {

    //     $factura=Facturacion::with('entidad')
    //     ->with('facturadetalles')
    //     ->find($factura->id);

    //     // dd($factura);

    //     $base=$factura->facturadetalles->where('iva', '!=', '0')->sum('base');
    //     $suplidos=$factura->facturadetalles->where('iva', '0')->sum('base');
    //     $totaliva=$factura->facturadetalles->sum('totaliva');
    //     $total=$factura->facturadetalles->sum('total');

    //     $fichero='Fra_Suma_'.$factura->serie.$factura->numfactura;
    //     $ruta='21/06';

    //     $pdf = \PDF::loadView('facturacion.facturapdf', compact(['factura','base','suplidos','totaliva','total']));

    //     Storage::put('public/facturas/'.$ruta.'/'.$fichero.'.pdf', $pdf->output());

    //     redirect()->back();

    // }

    public function imprimirfactura(Facturacion $factura)
    {

        $factura=Facturacion::with('entidad')
        ->with('facturadetalles')
        ->find($factura->id);

        $base=$factura->facturadetalles->where('iva', '!=', '0')->sum('base');
        $suplidos=$factura->facturadetalles->where('iva', '0')->sum('base');
        $totaliva=$factura->facturadetalles->sum('totaliva');
        $total=$factura->facturadetalles->sum('total');

        $fichero='Fra_Suma_'.$factura->serie.$factura->numfactura;
        $ruta='21/12';

        $pdf = \PDF::loadView('facturacion.facturapdf', compact(['factura','base','suplidos','totaliva','total']));

        Storage::put('public/facturas/'.$ruta.'/'.$fichero.'.pdf', $pdf->output());

        return $pdf->download($fichero.'.pdf');

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



}
