<?php

namespace App\Http\Livewire;

use App\Models\ContactoEntidad as ModelContactoEntidad;
use App\Models\Entidad;
use Livewire\Component;
use Livewire\WithPagination;


class ContactoEntidad extends Component
{
    use WithPagination;

    public $entidad;
    public $search='';
    public $conts;

    public function render()
    {
        $conts=Entidad::orderBy('entidad')->get();
        $ent=$this->entidad;
        $contactos = ModelContactoEntidad::where('entidad_id',$this->entidad->id)
        ->join('entidades','contacto_entidades.contacto_id','=','entidades.id')
        ->select('contacto_entidades.*', 'entidades.entidad', 'entidades.nif', 'entidades.tfno','entidades.emailgral')
        ->search('entidades.entidad',$this->search)
        ->orderBy('entidades.entidad')
        ->paginate(15);

        return view('livewire.contacto-entidad',compact('ent','contactos','conts'));
    }

    public function delete($contactoId)
    {
        $contactoBorrar = ModelContactoEntidad::find($contactoId);
        $e=Entidad::find($contactoBorrar->contacto_id);

        if ($contactoBorrar) {
            $contactoBorrar->delete();
            $this->dispatchBrowserEvent('notify', 'El contacto '.$e->entidad.'ha sido eliminado!');
        }
    }

}
