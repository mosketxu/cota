<?php

namespace App\Http\Livewire;

use App\Models\{Facturacion,FacturacionDetalle};


use Livewire\Component;

class DetalleFactura extends Component
{
    public $facturacion;
    public $editedDetalleIndex = null;
    public $editedDetalleField = null;
    public $detalles=[];

    protected $listeners = [
        'detalleupdate' => '$refresh',
    ];

    public function mount()
    {
        $this->detalles = FacturacionDetalle::where('facturacion_id', $this->facturacion->id)
            ->orderBy('orden')
            ->get();
            // ->toArray();

    }

    public function render()
    {
        $factura=$this->facturacion;
        $this->detalles = FacturacionDetalle::where('facturacion_id', $this->facturacion->id)
            ->orderBy('orden')
            ->get();
            // ->toArray();

        return view('livewire.detalle-factura',compact('factura'));
    }

    public function editDetalle($detalleIndex)
    {
        $this->editedDetalleIndex = $detalleIndex;
    }

    public function editDetalleField($detalleIndex, $fieldName)
    {
        $this->editedDetalleField = $detalleIndex . '.' . $fieldName;
    }

    public function saveDetalle($DetalleIndex)
    {
        $this->validate();

        $detalle = $this->detalles[$detalleIndex] ?? NULL;
        if (!is_null($detalle)) {
            $p=DetalleFactura::find($detalle['id']);
            $p->departamento=$detalle['departamento'];
            $p->comentarios=$detalle['comentarios'];
            $p->save();
        }
        $this->editedDetalleIndex = null;
        $this->editedDetalleField = null;
    }


}
