<?php

namespace App\Actions;

use App\Models\Facturacion;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\PDF;

class FacturaImprimirAction
{

    public function execute($facturacion)
    {
        $factura=Facturacion::with('entidad')
        ->with('facturadetalles')
        ->find($facturacion->id);

        $base=$factura->facturadetalles->where('iva', '!=', '0')->sum('base');
        $suplidos=$factura->facturadetalles->where('iva', '0')->sum('exenta');
        $totaliva=$factura->facturadetalles->sum('totaliva');
        $total=$factura->facturadetalles->sum('total');

        $pdf = \PDF::loadView('facturacion.facturapdf', compact(['factura','base','suplidos','totaliva','total']));
        Storage::put('public/'.$factura->ruta.'/'.$factura->fichero, $pdf->output());

        //     return $pdf->download($factura->fichero);

        // return $f;
    }
}
