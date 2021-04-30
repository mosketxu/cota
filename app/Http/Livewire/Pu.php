<?php

namespace App\Http\Livewire;

use App\Models\Pu as ModelPu;
use Livewire\Component;

class Pu extends Component
{
    public $entidad;
    public $search='';
    public $showEditModal = false;
    public $showDeleteModal = false;
    public ModelPu $editing;

    public function rules() {
        return [
            'editing.entidad_id' => 'numeric',
            'editing.destino' => 'string',
            'editing.url' => 'string',
            'editing.us' => 'string',
            'editing.us2' => 'string',
            'editing.ps' => 'string',
            'editing.observaciones' => 'string',
        ];
    }

    public function mount() {
        $this->editing = $this->makeBlankPu();
    }

    public function makeBlankPu(){
        return ModelPu::make([
            'destino' => '',
            'url' => '',
            'us' => '',
            'us2' => '',
            'ps' => '',
            'observaciones' => '',
        ]);
    }

    public function create(){
        if ($this->editing->getKey()) $this->editing = $this->makeBlankPu();
        $this->showEditModal = true;
    }

    public function edit(ModelPu $pu){
        if ($this->editing->isNot($pu)) $this->editing = $pu;
        $this->showEditModal = true;
    }

    public function save(){
        $this->validate();
        // dd('lego');
        $this->editing->entidad_id=$this->entidad->id;
        $this->editing->save();
        $this->showEditModal = false;
    }

    public function delete($puId)
    {
        $pu = ModelPu::find($puId);
        if ($pu) {
            $pu->delete();
            // session()->flash('message', $entidad->entidad.' eliminado!');
            $this->dispatchBrowserEvent('notify', 'La Pu ha sido eliminada!');
        }
    }

    public function render(){
        $ent=$this->entidad;
        $i=$this->search;
        $pus=ModelPu::where('entidad_id',$this->entidad->id)
        ->when($this->search !='',function ($query) use($i){
            $query->where(function($q) use ($i){
                $q->where('destino','like','%'.$this->search.'%')
                    ->orWhere('url','like','%'.$this->search.'%')
                    ->orWhere('us','like','%'.$this->search.'%')
                    ->orWhere('us2','like','%'.$this->search.'%')
                    ->orWhere('observaciones','like','%'.$this->search.'%');
                });
            })
        ->paginate();
        return view('livewire.pu',compact('ent','pus'));
    }
}
