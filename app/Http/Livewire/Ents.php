<?php

namespace App\Http\Livewire;

use App\Models\Entidad;
use Livewire\Component;
use Livewire\WithPagination;

class Ents extends Component
{
    use WithPagination;

    public $search='';
    public $filtrocliente=1;
    public $filtroactivo=1;


    public function render()
    {

        // $pus=Pu::where('entidad_id',$this->entidad->id)
        // ->when($this->search !='',function ($query) use($i){
        //     $query->where(function($q) use ($i){pappser
        //         $q->where('destino','like','%'.$this->search.'%')
        //             ->orWhere('url','like','%'.$this->search.'%')
        //             ->orWhere('us','like','%'.$this->search.'%')
        //             ->orWhere('us2','like','%'.$this->search.'%')
        //             ->orWhere('observaciones','like','%'.$this->search.'%');
        //         });
        //     })
        // ->get();

        // dd($this->filtroactivo);

        $entidades=Entidad::query()
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
            ->paginate(10);

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
