<?php

namespace App\Http\Livewire;

use App\Models\ContactoEntidad as ModelContactoEntidad;


use Livewire\Component;


class ContactoEntidad extends Component
{
    public $entidad;
    public $search='';

    public function render()
    {
        $ent=$this->entidad;
        $i=$this->search;
        $contactos=ModelContactoEntidad::where('entidad_id',$this->entidad->id)
            ->join('entidades','contacto_entidades.contacto_id','=','entidades.id')
            ->paginate();
        // dd($contactos);
            // ->paginate();
        return view('livewire.contacto-entidad',compact('ent','contactos'));
    }
}
