<?php

namespace App\Http\Livewire\Facturacion;

use App\Models\Facturacion;
use App\Models\FacturacionDetalle;
use Livewire\Component;

class FacturaDetallenuevoModal extends Component
{
    public $muestranuevomodal=false;
    public $facturaid=false;
    public $factura=false;
    public $detalleid;
    public $concepto;
    public $periodo;
    public $orden='0';

    protected function rules(){
        return [
            'concepto'=>'required',
            'periodo'=>'nullable',
            'orden'=>'nullable',
        ];}

    public function mount($factura){
        $this->facturaid=$factura->id;
        $this->factura=$factura;
    }

    public function render(){
        return view('livewire.facturacion.factura-detallenuevo-modal');
    }

    public function cambianuevomodal(){
        $this->muestranuevomodal= $this->muestranuevomodal==false ? true : false;
    }

    public function cancelarnuevomodal(){
        $this->orden='';
        $this->concepto='';
        $this->periodo='';
        $this->muestranuevomodal= false ;
    }

    public function save(){
        $this->orden=$this->orden =='' ? '0' : $this->orden;
        $i=$this->detalleid ? $this->detalleid : '0';
        $this->validate();
        $concepto=FacturacionDetalle::updateOrCreate([
            'id'=>$i
            ],
            [
            'facturacion_id'=>$this->facturaid,
            'orden'=>$this->orden,
            'concepto'=>$this->concepto,
            'periodo'=>$this->periodo,
            ]
        );

        $this->orden='';
        $this->concepto='';

        $this->muestranuevomodal=false;
        $notification = array(
            'message' => 'Concepto añadido satisfactoriamente!',
            'alert-type' => 'success'
        );

        $factura=Facturacion::find($concepto->facturacion_id);
        $vista =($factura->numfactura!='' || !is_null($factura->numfactura)) ? "facturacion.edit": 'facturacion.editprefactura';
        return redirect()->route($vista,$concepto->facturacion_id);
    }
}
