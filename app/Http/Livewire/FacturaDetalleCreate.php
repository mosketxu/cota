<?php

namespace App\Http\Livewire;

use App\Models\{Facturacion, FacturacionDetalle};
use Illuminate\Validation\Rule;


use Livewire\Component;

class FacturaDetalleCreate extends Component
{
    public $facturacion;
    public $detalle;

    protected $rules = [
        'facturacion.id' => 'required',
        'detalle.facturacion_id'=>'numeric',
        'detalle.orden'=>'numeric|nullable',
        'detalle.tipo'=>'numeric',
        'detalle.concepto'=>'nullable|max:250',
        'detalle.unidades'=>'numeric|nullable',
        'detalle.coste'=>'numeric|nullable',
        'detalle.iva'=>'numeric|nullable',
        'detalle.subcuenta'=>'numeric|nullable',
        'detalle.pagadopor'=>'numeric|nullable',
    ];

    public function mount(FacturacionDetalle $detalle)
    {
        $this->detalle=$detalle;
        $this->detalle->facturacion_id=$this->facturacion->id;
        $facturacion=$this->facturacion->id;
        // dd($facturacion);
        // $this->facturacion=$facturacion;
    }

    public function render()
    {
        $facturacion=$this->facturacion;
        return view('livewire.factura-detalle-create');
    }

    public function save()
    {
        if($this->detalle){
            $this->validate();

            FacturacionDetalle::create([
                'facturacion_id'=>$this->detalle->facturacion_id,
                'orden'=>$this->detalle->orden,
                'tipo'=>$this->detalle->tipo,
                'concepto'=>$this->detalle->concepto,
                'unidades'=>$this->detalle->unidades,
                'coste'=>$this->detalle->coste,
                'iva'=>$this->detalle->iva,
                'subcuenta'=>$this->detalle->subcuenta,
                'pagadopor'=>$this->detalle->pagadopor,
            ]);
            $this->dispatchBrowserEvent('notify', 'Detalle añadido con éxito');

            $this->reset('detalle');
            $this->emit('detalleupdate');
        }
    }
}


