<?php

namespace App\Http\Livewire;

use App\Models\{Facturacion};
use Livewire\Component;
use Livewire\WithPagination;

class Facturaciones extends Component
{
    use WithPagination;

    public $search='';
    public $filtrofacturable='1';
    public $filtrofacturado='';
    public $filtroenviada='';
    public $filtropagada='';


    public function render()
    {

        $facturaciones = Facturacion::query()
        ->join('entidades','facturacion.entidad_id','=','entidades.id')
        ->select('facturacion.*', 'entidades.entidad', 'entidades.nif','entidades.emailadm')
        ->when($this->filtrofacturable!='', function ($query){
            $query->where('facturable',$this->filtrofacturable);
            })
        ->when($this->filtroenviada!='', function ($query){
            $query->where('enviada',$this->filtroenviada);
            })
        ->when($this->filtropagada!='', function ($query){
            $query->where('pagada',$this->filtropagada);
            })
        ->when($this->filtrofacturado!='', function ($query){
            if($this->filtrofacturado=='0'){
                $query->where('asiento','0');
            }else{
                $query->where('asiento','>','0');
            }
        })
        ->search('entidades.entidad',$this->search)
        ->orSearch('facturacion.numfactura',$this->search)
        ->orderBy('facturacion.numfactura','desc')
        ->orderBy('facturacion.id','desc')
        ->paginate();

        return view('livewire.facturaciones',compact('facturaciones'));
    }
}
