<?php

namespace App\Actions;

use App\Models\Entidad;
use App\Models\Facturacion;
use App\Models\FacturacionDetalle;

class FacturaCreateAction
{
    public function execute(Facturacion $factura){
        $serie= !$factura->serie ? $factura->fechafactura->format('Y') : $factura->serie;
        $factura->metodopago_id= !$factura->metodopago_id ? '1' : $factura->metodopago_id;

        if (!$factura->numfactura){
            $fac=Facturacion::where('serie', $serie)->max('numfactura') ;
            $fac= $fac ? $fac + 1 : ($serie * 1000 +1) ;
        }else{
            $fac=$factura->numfactura;
        }
        $ruta='facturas/'.$serie.'/'.$factura->fechafactura->format('m');
        $factura->ruta=$ruta;
        // $caracteresmalos=[' ','.',',',"'"];
        // $enti=Entidad::find($factura->entidad_id)->entidad;
        $enti=Entidad::find($factura->entidad_id)->entidad;
        $ent=str_replace($caracteresmalos,"",$enti);

        $fichero=(trim('F.'.$serie.'.'.substr ( $fac ,-3 ).' '.$ent,' ').'.pdf');

        $factura->fichero=substr($fichero, 0, 90);
        $factura->serie=$serie;
        $factura->numfactura=$fac;
        $factura->facturada= (FacturacionDetalle::where('facturacion_id',$factura->id)->count() > 0) ? 1 : 0;
        $factura->save();
        return $factura;
    }
}
