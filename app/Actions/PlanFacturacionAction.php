<?php

namespace App\Actions;

use App\Models\Facturacion;

class PlanFacturacionAction
{
    public function execute($entidad, $concepto)
    {
        for ($i=0; $i <$concepto->ciclo->ciclos ; $i++) {
            $p=new PrefacturaCreateAction;
            $prefactura=$p->execute();
        }
        $sumaId=!$factura->entidad->suma_id ? '1' :$factura->entidad->suma_id;
        if ($concepto->ciclo_id==1) {
            $per=mes($factura->fechafactura,$concepto->ciclocorrespondiente,$factura->entidad->idioma);
        }else{
            $per=trimestre($factura->fechafactura,$concepto->ciclocorrespondiente,$factura->entidad->idioma);
        }
        $f=FacturacionDetalle::create([
            'facturacion_id'=>$factura->id,
            'orden'=>'0',
            'tipo'=>'0',
            'concepto'=>$concepto->concepto,
            'periodo'=>$per,
            'unidades'=>'1',
            'importe'=>$concepto->importe,
            'iva'=>$factura->entidad->tipoiva,
            'subcuenta'=>'705000',
            'pagadopor'=>$sumaId,
            ]);
        return $f;
    }

}
