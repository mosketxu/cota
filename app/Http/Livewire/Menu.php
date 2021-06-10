<?php

namespace App\Http\Livewire;

use App\Models\Entidad;
use Livewire\Component;

class Menu extends Component
{

    public $entmenu;

    public function mount(Entidad $entidad)
    {
        $this->entmenu=$entidad;
    }


    public function render()
    {
        return view('livewire.menu');
    }
}
