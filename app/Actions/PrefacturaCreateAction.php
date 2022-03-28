<?php

namespace App\Actions;

use App\Models\Facturacion;


class PrefacturaCreateAction
{
    public function execute(Facturacion $factura)
    {

        $this->conceptos=FacturacionConcepto::where('entidad_id',$this->factura->entidad_id)->get();
        $entidad=Entidad::find($this->factura->entidad_id);
        $mes = date("m", strtotime(date("d-m-Y")));
        $anyo = date("Y", strtotime(date("d-m-Y")));
        if(!$this->factura->fechafactura){
            $this->factura->fechafactura=$entidad->diafactura.'-'.$mes.'-'.$anyo;
            $this->factura->fechavencimiento=$entidad->diavencimiento.'-'.$mes.'-'.$anyo;
        }
        if(!$this->factura->metodopago_id)
            $this->factura->metodopago_id=$entidad->metodopago_id;
        if(!$this->factura->refcliente)
            $this->factura->refcliente=$entidad->refcliente;
        if(!$this->factura->enviar)
            $this->factura->enviar=$entidad->enviar;





$serie= !$factura->serie ? substr($factura->fechafactura->format('Y'), -2) : $factura->serie;
        $factura->metodopago_id= !$factura->metodopago_id ? '1' : $factura->metodopago_id;

        if (!$factura->numfactura){
            $fac=Facturacion::where('serie', $serie)->max('numfactura') ;
            $fac= $fac ? $fac + 1 : ($serie * 100000 +1) ;
        }else{
            $fac=$factura->numfactura;
        }
        $factura->ruta='facturas/'.$serie.'/'.$factura->fechafactura->format('m');
        $caracteresmalos=['.',',',"'"];
        $ent=str_replace($caracteresmalos,"",$factura->entidad);
        $factura->fichero=(trim('Fra_Suma_'.$factura->serie.'_'.substr ( $fac ,-5 ).'_'.$ent,' ').'.pdf');
        $factura->serie=$serie;
        $factura->numfactura=$fac;
        $factura->facturada=true;
        $factura->save();
        return $factura;
    }
}
