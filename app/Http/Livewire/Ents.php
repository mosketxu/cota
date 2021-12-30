<?php

namespace App\Http\Livewire;

use App\Models\Entidad;
use Livewire\Component;
use Livewire\WithPagination;

class Ents extends Component
{
    use WithPagination;

    public $search='';
    public $filtrocliente='';
    public $filtroactivo='';
    public Entidad $entidad;


    public function render()
    {
        $this->entidad= new Entidad;
        $entidades=Entidad::query()
            ->with('entidadtipo')
            ->when($this->filtrocliente!='', function ($query){
                $query->where('cliente',$this->filtrocliente);
                })
            ->when($this->filtroactivo!='', function ($query){
                $query->where('estado',$this->filtroactivo);
                })
            ->search('entidad',$this->search)
            ->orSearch('nif',$this->search)
            ->orderBy('favorito','desc')
            ->orderBy('entidad','asc')
            ->paginate(15);

        return view('livewire.ents',compact('entidades'));
    }

    public function delete($entidadId)
    {
        $entidad = Entidad::find($entidadId);
        if ($entidad) {
            $entidad->delete();
            // session()->flash('message', $entidad->entidad.' eliminado!');
            $this->dispatchBrowserEvent('notify', 'La entidad: '.$entidad->entidad.' ha sido eliminada!');
        }
    }
}
