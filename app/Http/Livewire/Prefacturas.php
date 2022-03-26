<?php

namespace App\Http\Livewire;

use App\Models\{Facturacion,Entidad};
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\DataTable\WithBulkActions;

class Prefacturas extends Component
{
    use WithPagination, WithBulkActions;

    public $entidad;
    public $search='';
    public $filtrofacturable='1';
    public $filtroanyo='';
    public $filtromes='';

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

    public function render(){

        if($this->selectAll) $this->selectPageRows();
        $facturaciones = $this->rows;
        return view('livewire.prefacturas',compact('facturaciones'));
    }

    public function getRowsQueryProperty(){
        return Facturacion::query()
            ->with('metodopago')
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
            ->orderBy('facturacion.fechafactura')
            ->orderBy('entidades.entidad');
            // ->paginate(5); solo contemplo la query, no el resultado. Luego pongo el resultado: get, paginate o lo que quiera
    }

    public function getRowsProperty(){
        return $this->rowsQuery->paginate(100);
    }

    //  GENERO LAS PREFACTURAS SELECCIONADAS

    public function generarSelected(){
        $prefacturas = $this->selectedRowsQuery->get();
        $this->validate();

        foreach ($prefacturas as $prefactura) {
            $serie= !$prefactura->serie ? substr($prefactura->fechafactura->format('Y'),-2) : $prefactura->serie;
            $fac=Facturacion::where('serie',$serie)->max('numfactura') ;
            $fac= $fac ? $fac + 1 : ($serie * 100000 +1) ;
            $prefactura->numfactura=$fac;

            $prefactura->metodopago_id= !$prefactura->metodopago_id ? '1' : $prefactura->metodopago_id;
            $prefactura->serie=$serie;
            $prefactura->facturada=true;

            $prefactura->ruta='facturas/'.$prefactura->serie.'/'.$prefactura->fechafactura->format('m');
            // $prefactura->fichero=(trim('Fra_Suma_'.$prefactura->serie.'_'.substr ( $fac ,-5 ).'_'.substr ( $prefactura->entidad ,0,strlen($prefactura->entidad) ),' ').'.pdf');
            $prefactura->fichero=(trim('Fra_Suma_'.$prefactura->serie.'_'.substr ( $fac ,-5 ).'_'.substr ( $prefactura->entidad ,0,6 ),' ').'.pdf');

            $prefactura->save();
            // genero la factura y la guardo en su carpeta de storage
            $prefactura->imprimirfactura();
            $this->dispatchBrowserEvent('notify', 'La factura ' . $prefactura->factura5 . ' ha sido creada!');
        }
    }

    public function exportSelected(){
        //toCsv es una macro a n AppServiceProvider
        return response()->streamDownload(function(){
            echo $this->selectedRowsQuery->toCsv();
        },'prefacturas.csv');

        $this->dispatchBrowserEvent('notify', 'CSV Prefacturas descargado!');
    }



    public function deleteSelected(){
        // $prefacturas=Facturacion::findMany($this->selected); funciona muy bien

        $deleteCount = $this->selectedRowsQuery->count();
        $this->selectedRowsQuery->delete();
        $this->showDeleteModal = false;

        $this->dispatchBrowserEvent('notify', $deleteCount . ' Prefacturas eliminadas!');
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


