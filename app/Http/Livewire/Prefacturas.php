<?php

namespace App\Http\Livewire;

use App\Models\{Facturacion,Entidad};
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Prefacturas extends Component
{
    use WithPagination;

    public $entidad;
    public $search='';
    public $filtrofacturable='1';
    public $filtroanyo='';
    public $filtromes='';
    public $selectPage=false;
    public $selectAll=false;
    public $selected=[];
    public $showDeleteModal=false;

    protected function rules(){
        return [
            'filtroanyo'=>'required',
            'filtromes'=>'required',
            'filtrofacturable'=>'in:1',
        ];
    }

    public function mount(Entidad $entidad){
        $this->filtroanyo=date('Y');
        $this->filtromes=intval(date('m'));
        $this->entidad=$entidad;
    }

    public function updatedSelected(){
        $this->selectAll=false;
        $this->selectPage=false;
    }

    public function updatedSelectPage($value){
        $this->selected= $value
            ? $this->prefacturas->pluck('id')->map(fn($id)=>(string) $id)
            : [];
    }

    public function selectAll(){
        $this->selectAll=true;
    }

    public function getPrefacturasQueryProperty(){
        return Facturacion::query()
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
            ->orderBy('facturacion.id','desc');
            // ->paginate(5); solo contemplo la query, no el resultado. Luego pongo el resultado: get, paginate o lo que quiera
    }

    public function getPrefacturasProperty(){
        return $this->prefacturasQuery->paginate(5);
    }

    public function render(){

        if($this->selectAll){
            $this->selected=$this->prefacturas->pluck('id')->map(fn($id)=>(string) $id);
        }
        $facturaciones = $this->prefacturas;

        return view('livewire.prefacturas',compact('facturaciones'));
    }

    public function creafacturas(){
        $prefacturas = $this->prefacturas;
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

    public function exportSelected(){
        //toCsv es una macro a n AppServiceProvider
        return response()->streamDownload(function(){
            echo (clone $this->prefacturasQuery)
                ->unless($this->selectAll, fn($query)=> $query->whereKey($this->selected))
                ->toCsv();
            // echo Facturacion::whereKey($this->selected)->toCsv();
        },'prefacturas.csv');

        $this->dispatchBrowserEvent('notify', 'CSV Prefacturas descargado!');
    }

    public function deleteSelected(){
        // $prefacturas=Facturacion::findMany($this->selected); funciona muy bien

        (clone $this->prefacturasQuery)
            ->unless($this->selectAll, fn($query)=> $query->whereKey($this->selected))
            ->delete();

        $this->showDeleteModal= false;

        $this->dispatchBrowserEvent('notify', 'Prefacturas eliminadas!');
    }

    public function delete($facturacionId){
        $facturacion = Facturacion::find($facturacionId);
        if ($facturacion) {
            $facturacion->delete();
            // session()->flash('message', $facturacion->entidad.' eliminado!');
            $this->dispatchBrowserEvent('notify', 'La línea de pre-factura: '.$facturacion->id.'-'.$facturacion->numfactura.' ha sido eliminada!');
        }
    }
}


