<?php

namespace App\Actions;

use App\Models\Facturacion;
use App\Models\FacturacionDetalle;

class FacturaReplicarAction
{
    public function execute(Facturacion $factura)
    {
        // clono la cabecera de la factura
        $clone = $factura->replicate()->fill([
            'numfactura'=>'',
            'enviada'=>0,
            'pagada'=>0,
            'facturada'=>0,
            'asinto'=>null,
            'fechaasiento'=>null,
            'observaciones'=>null,
            'notas'=>null,
            'ruta'=>null,
            'fichero'=>null,
        ]);
        $clone->save();

        // clono los detalles
        $detalles= FacturacionDetalle::where('facturacion_id', $factura->id)->get();
        foreach ($detalles as $detalle) {
            $detalle->replicate()->fill([
                'facturacion_id'=>$clone->id,
            ])->save();
        }

        return $clone;
    }
}
