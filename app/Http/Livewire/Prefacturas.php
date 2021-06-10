<?php

namespace App\Http\Livewire;

use App\Models\{Facturacion,Entidad};
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Prefacturas extends Component
{
    use WithPagination;

    public $search='';
    public $filtrofacturable='1';
    public $filtroanyo='';
    public $filtromes='';
    public $entidad;

    protected function rules()
    {
        return [
            'filtroanyo'=>'required',
            'filtromes'=>'required',
            'filtrofacturable'=>'in:1',
        ];
    }

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
        ->where(function ($query){
            $query->where('numfactura','')
                ->orWhere('numfactura',null);
        })
        ->when($this->filtrofacturable!='', function ($query){
            $query->where('facturable',$this->filtrofacturable);
            })
        ->when($this->entidad->id!='', function ($query){
            $query->where('entidad_id',$this->entidad->id);
            })
        ->searchYear('fechafactura',$this->filtroanyo)
        ->searchMes('fechafactura',$this->filtromes)
        ->search('entidades.entidad',$this->search)
        ->orderBy('facturacion.id','desc')
        ->paginate();

        return view('livewire.prefacturas',compact('facturaciones'));
    }

    public function creafacturas()
    {
        $prefacturas = Facturacion::query()
        ->join('entidades','facturacion.entidad_id','=','entidades.id')
        ->select('facturacion.*', 'entidades.entidad', 'entidades.nif','entidades.emailadm')
        ->where(function ($query){
            $query->where('numfactura','')
                ->orWhere('numfactura',null);
        })
        ->when($this->filtrofacturable!='', function ($query){
            $query->where('facturable',$this->filtrofacturable);
            })
        ->when($this->entidad->id!='', function ($query){
            $query->where('entidad_id',$this->entidad->id);
            })
        ->searchYear('fechafactura',$this->filtroanyo)
        ->searchMes('fechafactura',$this->filtromes)
        ->search('entidades.entidad',$this->search)
        // ->where('facturacion.id','13')
        ->get();

        $this->validate();

        $serie=substr($this->filtroanyo,2,2);

        $fac=Facturacion::where('serie',$serie)->max('numfactura') ;

        $fac= $fac ? $fac + 1 : ($serie * 100000 +1) ;


        foreach ($prefacturas as $prefactura) {
            $prefactura->serie=$serie;
            $prefactura->numfactura=$fac;
            $prefactura->save();
            $fac=$fac+1;
            $this->dispatchBrowserEvent('notify', 'La factura' . $prefactura->id .'-'.$prefactura->numfactura. ' ha sido creada!');
        }

        // $this->nf=$serie.'-'.$fac;

    }
    public function delete($facturacionId)
    {
        $facturacion = Facturacion::find($facturacionId);
        if ($facturacion) {
            $facturacion->delete();
            // session()->flash('message', $facturacion->entidad.' eliminado!');
            $this->dispatchBrowserEvent('notify', 'La línea de pre-factura: '.$facturacion->id.'-'.$facturacion->numfactura.' ha sido eliminada!');
        }
    }
}


