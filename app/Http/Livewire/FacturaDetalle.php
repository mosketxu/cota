<?php

namespace App\Http\Livewire;

use App\Models\{Facturacion,FacturacionDetalle};


use Livewire\Component;

class FacturaDetalle extends Component
{
    public $facturacion;
    public $editedDetalleIndex = null;
    public $editedDetalleField = null;
    public $detalles=[];
    public $iva;
    public $total;

    protected $listeners = [
        'detalleupdate' => '$refresh',
    ];

    protected $rules = [
        'detalles.*.orden' => ['numeric'],
        'detalles.*.tipo' => ['numeric'],
        'detalles.*.concepto' => ['max:150'],
        'detalles.*.unidades' => ['numeric'],
        'detalles.*.coste' => ['numeric'],
        'detalles.*.iva' => ['numeric'],
        'detalles.*.subcuenta' => ['numeric'],
        'detalles.*.pagadopor' => ['numeric'],
    ];

    public function mount(){
        $this->detalles = FacturacionDetalle::where('facturacion_id', $this->facturacion->id)
            ->orderBy('orden')
            ->get()
            ->toArray();


    }

    public function render(){
        $factura=$this->facturacion;
        $this->detalles = FacturacionDetalle::where('facturacion_id', $this->facturacion->id)
            ->orderBy('orden')
            ->get()
            ->toArray();

        return view('livewire.factura-detalle',compact('factura'));
    }

    public function editDetalle($detalleIndex){
        $this->editedDetalleIndex = $detalleIndex;
    }

    public function editDetalleField($detalleIndex, $fieldName){
        $this->editedDetalleField = $detalleIndex . '.' . $fieldName;
    }

    public function saveDetalle($detalleIndex){
        $this->validate();

        $detalle = $this->detalles[$detalleIndex] ?? NULL;
        if (!is_null($detalle)) {
            $p=FacturacionDetalle::find($detalle['id']);
            $p->orden=$detalle['orden'];
            $p->tipo=$detalle['tipo'];
            $p->concepto=$detalle['concepto'];
            $p->unidades=$detalle['unidades'];
            $p->coste=$detalle['coste'];
            $p->iva=$detalle['iva'];
            $p->subcuenta=$detalle['subcuenta'];
            $p->pagadopor=$detalle['pagadopor'];
            $p->save();
        }
        $this->editedDetalleIndex = null;
        $this->editedDetalleField = null;
    }


}
