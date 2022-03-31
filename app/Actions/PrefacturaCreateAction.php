<?php

namespace App\Actions;

use App\Models\{Entidad, Facturacion,FacturacionConcepto};

class PrefacturaCreateAction
{
    public function execute(FacturacionConcepto $concepto, Entidad $entidad, $anyoplan)
    {
        $ciclos=$concepto->ciclo->ciclos;
        for ($i=0; $i < $ciclos ; $i++) {
            $ffra=$anyoplan.'-'.($i+1).'-'.$entidad->diafactura;
            $fvto=$anyoplan.'-'.($i+1).'-'.$entidad->diavencimiento;
            $fac=Facturacion::create([
                'entidad_id'=>$concepto->entidad_id,
                'fechafactura'=>$ffra,
                'fechavencimiento'=>$fvto,
                'metodopago_id'=>$entidad->metodopago_id,
                'refcliente'=>$entidad->refcliente,
                'mail'=>$entidad->emailadm,
                'enviar'=>$entidad->enviar,
                'enviada'=>'0',
                'pagada'=>'0',
                'facturada'=>'0',
                'facturable'=>'1',
                'asiento'=>'0',
                // 'fechaasiento'=>$entidad->fechaasiento,
                'observaciones'=>$entidad->observaciones,
                'notas'=>$entidad->notas,
            ]);
            $fc=new FacturaConceptoStoreAction;
            $fc->execute($fac,$concepto);
        }
    $mensaje='Exito';
        return $mensaje;
    }
}
