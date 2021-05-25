<?php

namespace App\Http\Livewire;

use App\Models\ContactoEntidad as ModelContactoEntidad;
use App\Models\Entidad;
use Livewire\Component;


class ContactoEntidad extends Component
{
    public $entidad;
    public $search='';
    public $conts;
    public $editedContactoIndex = null;
    public $editedContactoField = null;
    public $contactos=[];

    protected $listeners = [
        'contactoupdate' => '$refresh',
    ];


    protected $rules = [
        'contactos.*.departamento' => ['max:100'],
        'contactos.*.comentarios' => ['max:150'],
    ];

    protected $validationAttributes = [
        'contactos.*.departamento' => 'Departamento',
        'contactos.*.comentarios' => 'Comentario',
    ];

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
        $conts=Entidad::orderBy('entidad')->get();
        $ent=$this->entidad;
        $this->contactos = ModelContactoEntidad::where('entidad_id',$this->entidad->id)
        ->join('entidades','contacto_entidades.contacto_id','=','entidades.id')
        ->select('contacto_entidades.*', 'entidades.entidad', 'entidades.nif', 'entidades.tfno','entidades.emailgral')
        ->search('entidades.entidad',$this->search)
        ->orderBy('entidades.entidad')
        ->get()
        ->toArray();

        $contactos=$this->contactos;

        return view('livewire.contacto-entidad',compact('ent','contactos','conts'));
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
        $this->validate();

        $contacto = $this->contactos[$contactoIndex] ?? NULL;

        if (!is_null($contacto)) {
            $p=ModelContactoEntidad::find($contacto['id']);
            $p->departamento=$contacto['departamento'];
            $p->comentarios=$contacto['comentarios'];
            $p->save();
        }
        $this->editedContactoIndex = null;
        $this->editedContactoField = null;
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
