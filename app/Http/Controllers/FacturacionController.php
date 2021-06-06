<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use Illuminate\Http\Request;
use Barryvdh\Snappy\PDF;
use Illuminate\Support\Facades\Storage;

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
    public function show($id)
    {
        //
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

    public function pdf(Facturacion $factura)
    {
        $factura=Facturacion::with('entidad')
        ->with('facturadetalles')
        ->find($factura->id);

        $base=$factura->facturadetalles->where('iva','!=','0')->sum('base');
        $suplidos=$factura->facturadetalles->where('iva','0')->sum('base');
        $totaliva=$factura->facturadetalles->sum('totaliva');
        $total=$factura->facturadetalles->sum('total');

        // dd($fact);

        // return view('facturacion.pdf',compact(['factura','base','suplidos','totaliva','total']));
        return view('facturacion.facturapdf',compact(['factura','base','suplidos','totaliva','total']));
    }


    public function downpdf(Facturacion $factura)
    {
        $factura=Facturacion::with('entidad')
        ->with('facturadetalles')
        ->find($factura->id);

        $base=$factura->facturadetalles->where('iva', '!=', '0')->sum('base');
        $suplidos=$factura->facturadetalles->where('iva', '0')->sum('base');
        $totaliva=$factura->facturadetalles->sum('totaliva');
        $total=$factura->facturadetalles->sum('total');

        $fichero='Fra_Suma_'.$factura->serie.$factura->numfactura;
        $ruta='21/06';

        $pdf = \PDF::loadView('facturacion.facturapdf', compact(['factura','base','suplidos','totaliva','total']));

        Storage::put('public/facturas/'.$ruta.'/'.$fichero.'.pdf', $pdf->output());

    }

}
