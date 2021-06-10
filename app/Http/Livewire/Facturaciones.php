<?php

namespace App\Http\Livewire;

use App\Models\{Facturacion,Entidad};
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Facturaciones extends Component
{
    use WithPagination;

    public $search='';
    public $filtrofacturado='';
    public $filtrocontabilizado='';
    public $filtroenviada='';
    public $filtropagada='';
    public $filtroanyo='';
    public $filtromes='';
    public $entidad;


    public function mount(Entidad $entidad)
    {
        $this->filtroanyo=date('Y');
        $this->filtromes=intval(date('m'));
        $this->entidad=$entidad;
    }

    public function render()
    {
        $facturaciones = Facturacion::query()
        ->join('entidades','facturacion.entidad_id','=','entidades.id')
        ->select('facturacion.*', 'entidades.entidad', 'entidades.nif','entidades.emailadm')
        ->where('numfactura','<>','')
        ->when($this->filtroenviada!='', function ($query){
            $query->where('enviada',$this->filtroenviada);
            })
        ->when($this->filtropagada!='', function ($query){
            $query->where('pagada',$this->filtropagada);
            })
        ->when($this->entidad->id!='', function ($query){
            $query->where('entidad_id',$this->entidad->id);
            })
        ->when($this->filtrocontabilizado!='', function ($query){
            if($this->filtrocontabilizado=='0'){
                $query->where('asiento','0');
            }else{
                $query->where('asiento','>','0');
            }
        })
        ->searchYear('fechafactura',$this->filtroanyo)
        ->searchMes('fechafactura',$this->filtromes)
        ->search('entidades.entidad',$this->search)
        ->orSearch('facturacion.numfactura',$this->search)
        ->orderBy('facturacion.numfactura','desc')
        ->orderBy('facturacion.id','desc')
        ->paginate();


        $totales= Facturacion::query()
        ->join('entidades','facturacion.entidad_id','=','entidades.id')
        ->join('facturacion_detalles','facturacion.id','=','facturacion_detalles.facturacion_id')
        ->select('facturacion.*', 'entidades.entidad', 'entidades.nif','entidades.emailadm',DB::raw('sum(unidades * coste) as totalbase'),DB::raw('sum(unidades * coste * iva) as totaliva'),DB::raw('sum(unidades * coste * (1+ iva)) as totales'))
        ->where('numfactura','<>','')
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
        ->searchYear('fechafactura',$this->filtroanyo)
        ->searchMes('fechafactura',$this->filtromes)
        ->search('entidades.entidad',$this->search)
        ->orSearch('facturacion.numfactura',$this->search)
        ->first();


        return view('livewire.facturaciones',compact('facturaciones','totales'));
    }


    public function delete($facturacionId)
    {
        $facturacion = Facturacion::find($facturacionId);
        if ($facturacion) {
            $facturacion->delete();
            // session()->flash('message', $facturacion->entidad.' eliminado!');
            $this->dispatchBrowserEvent('notify', 'La línea de facturación: '.$facturacion->id.'-'.$facturacion->numfactura.' ha sido eliminada!');
        }
    }
}
