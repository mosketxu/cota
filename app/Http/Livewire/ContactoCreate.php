<?php

namespace App\Http\Livewire;

use App\Models\ContactoEntidad;
use App\Models\Entidad;

use Illuminate\Validation\Rule;
use Livewire\Component;


class ContactoCreate extends Component
{
    public $entidad;
    public $contacto;
    public $departamento;
    public $comentario;

    protected $rules = [
        'entidad.id' => 'required',
    ];

    public function render()
    {
        $entidad=$this->entidad;
        $contactos=Entidad::select('id','entidad')->orderBy('entidad')->get();

        return view('livewire.contacto-create',compact('contactos'));
    }

    public function savecontacto()
    {
        if($this->contacto){
            ContactoEntidad::create([
                 'entidad_id'=>$this->entidad->id,
                 'contacto_id'=>$this->contacto,
                 'departamento'=>$this->departamento,
                 'comentarios'=>$this->comentario,
            ]);
            $this->dispatchBrowserEvent('notify', 'Contacto añadido con éxito');

            $this->reset('contacto');
            $this->reset('departamento');
            $this->reset('comentario');

            $this->emit('contactoupdate');


        }

    }


}
