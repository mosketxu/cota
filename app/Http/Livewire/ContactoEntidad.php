<?php

namespace App\Http\Livewire;

use App\Models\ContactoEntidad as ModelContactoEntidad;
use Livewire\Component;


class ContactoEntidad extends Component
{
    public $entidad;
    public $search='';
    public $editedContactoIndex = null;
    public $editedContactoField = null;
    public $contactos=[];

    public function mount()
    {
        $this->contactos = ModelContactoEntidad::where('entidad_id',$this->entidad->id)
            ->join('entidades','contacto_entidades.contacto_id','=','entidades.id')
            ->select('contacto_entidades.*', 'entidades.entidad', 'entidades.nif', 'entidades.tfno','entidades.emailgral')
            ->orderBy('entidades.entidad')
            ->get()
            ->toArray();
        }

        public function render()
        {
            $ent=$this->entidad;
            $this->contactos = ModelContactoEntidad::where('entidad_id',$this->entidad->id)
            ->join('entidades','contacto_entidades.contacto_id','=','entidades.id')
            ->select('contacto_entidades.*', 'entidades.entidad', 'entidades.nif', 'entidades.tfno','entidades.emailgral')
            ->search('entidades.entidad',$this->search)
            ->orderBy('entidades.entidad')
            ->get()
            ->toArray();

            $contactos=$this->contactos;

        return view('livewire.contacto-entidad',compact('ent','contactos'));
    }

    public function editContacto($contactoIndex)
    {
        $this->editedContactoIndex = $contactoIndex;
    }

    public function editContactoField($contactoIndex, $fieldName)
    {
        $this->editedContactoField = $contactoIndex . '.' . $fieldName;
    }

    public function saveContacto($contactoIndex)
    {
        // $this->validate();

        $contacto = $this->contactos[$contactoIndex] ?? NULL;
        // dd($contacto);
        if (!is_null($contacto)) {
            $p=ModelContactoEntidad::find($contacto['id']);
            // dd($p);
            $p->departamento=$contacto['departamento'];
            $p->comentarios=$contacto['comentarios'];
            $p->save();
            // optional(ContactoEntidad::find($contacto['id']))->update($contacto);
        }
        $this->editedContactoIndex = null;
        $this->editedContactoField = null;
    }
}
