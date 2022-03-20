<?php

namespace App\Http\Livewire;

use App\Models\{FacturacionConcepto,Ciclo};
use Livewire\Component;

class FacturacionConceptos extends Component
{
    public $entidad;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public FacturacionConcepto $editing;


    public function rules() {
        return [
            'editing.concepto' => 'required|string',
            'editing.importe' => 'required|numeric',
            'editing.ciclo_id' => 'required|numeric',
            'editing.ciclocorrespondiente' => 'required|numeric',
        ];
    }

    public function mount() {
        $this->editing = $this->makeBlank();
    }

    public function render()
    {
        $ent=$this->entidad;
        $conceptos=FacturacionConcepto::where('entidad_id',$this->entidad->id)->get();
        $ciclos=Ciclo::get();


        return view('livewire.facturacion-conceptos',compact('ent','conceptos','ciclos'));
    }

    public function makeBlank(){
        return FacturacionConcepto::make([
            'concepto' => '',
            'importe' => '0',
            'ciclo_id' => '',
            'ciclocorrespondiente' => '',
        ]);
    }

    public function create(){
        if ($this->editing->getKey()) $this->editing = $this->makeBlank();
        $this->showEditModal = true;
    }

    public function edit(FacturacionConcepto $concepto){
        if ($this->editing->isNot($concepto)) $this->editing = $concepto;
        $this->showEditModal = true;
    }

    public function save(){
        if(!$this->editing->ciclocorrespondiente) $this->editing->ciclocorrespondiente=0;
        $this->editing->entidad_id=$this->entidad->id;
        $this->validate();
        $this->editing->entidad_id=$this->entidad->id;
        $this->editing->save();
        $this->showEditModal = false;
    }

    public function delete($conceptoId)
    {
        $concepto = FacturacionConcepto::find($conceptoId);
        if ($concepto) {
            $concepto->delete();
            $this->dispatchBrowserEvent('notify', 'El concepto ha sido eliminado!');
        }
    }
}
