<?php

namespace App\Http\Livewire;

// use App\Actions\MonthQuarterAction;

use App\Actions\FacturaConceptoStoreAction;
use App\Models\{Entidad, Facturacion,FacturacionDetalle, FacturacionConcepto, MetodoPago};
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Livewire\Component;


// use Illuminate\Support\Facades\DB;

class Factura extends Component
{

    public $factura;
    public $conceptos;
    public $facturada;
    public $mostrarGenerar=0;
    public $message;
    public $showgenerar;
    public $nf;

    protected $listeners = [
        'facturaupdate' => '$refresh',
    ];

    protected function rules(){
        return [
            'factura.id'=>'nullable',
            'factura.numfactura'=>'nullable',
            'factura.serie'=>'nullable',
            'factura.entidad_id'=>'required',
            'factura.fechafactura'=>'date|required',
            'factura.fechavencimiento'=>'date|nullable',
            'factura.metodopago_id'=>'numeric|nullable',
            'factura.refcliente'=>'nullable',
            'factura.mail'=>'nullable',
            'factura.enviar'=>'boolean|nullable',
            'factura.enviada'=>'boolean|nullable',
            'factura.pagada'=>'boolean|nullable',
            'factura.facturable'=>'boolean|nullable',
            'factura.facturada'=>'boolean|nullable',
            'factura.asiento'=>'numeric|nullable',
            'factura.fechaasiento'=>'date|nullable',
            'factura.observaciones'=>'nullable',
            'factura.notas'=>'nullable',
            'factura.ruta'=>'nullable',
            'factura.fichero'=>'nullable',
        ];
    }

    public function mount(Facturacion $facturacion)
    {
        $this->factura=$facturacion;
        $this->factura->enviar=1;
        $this->factura->enviada=0;
        $this->factura->pagada=0;
        $this->factura->facturable=1;
        $this->facturada=$facturacion->facturada ? true : false;
        $this->showgenerar = $facturacion->facturada ? false : true;
        // $this->showgenerar = $this->factura->facturada ? false : true;
        $this->nf=$this->factura->numfactura ? $this->factura->serie.'-'.substr($this->factura->numfactura,-5) :'';
        $this->conceptos=FacturacionConcepto::where('entidad_id',$facturacion->entidad_id)->get();
    }

    public function render()
    {
        $factura=$this->factura;
        if($factura->id){
            if(!$factura->numfactura){
                $this->mostrarGenerar=1;
            }
        }

        $entidades=Entidad::where('estado','1')->where('cliente','1')->orderBy('entidad')->get();
        $pagos=MetodoPago::all();
        return view('livewire.factura',compact('entidades','pagos','factura'));
    }

    public function updatedFacturaEntidadId()
    {
        $this->conceptos=FacturacionConcepto::where('entidad_id',$this->factura->entidad_id)->get();
        $DateEntero = strtotime(date("d-m-Y"));
        $mes = date("m", $DateEntero);
        $anyo = date("Y", $DateEntero);
        if(!$this->factura->fechafactura){
            $entidad=Entidad::find($this->factura->entidad_id);
            $this->factura->fechafactura=$entidad->diafactura.'-'.$mes.'-'.$anyo;
            $this->factura->fechavencimiento=$entidad->diavencimiento.'-'.$mes.'-'.$anyo;
        }
    }

    public function updatedFacturada(){
        if($this->facturada){
            $this->message="Debes pulsar Generar para aplicar los cambios a la factura";
            $this->facturada=false;
        }else{
            $f=Facturacion::find($this->factura->id);
            $f->facturada=false;
            $f->save();
            $this->redirect( route('facturacion.edit',$f) );
        }
    }

    public function save(){
        $this->validate();

        if ($this->factura->facturada==true  ) {
            $this->message="No se pueden modificar los datos si ya están facturados.";
        } else {
            $this->message='';
            if ($this->factura->id) {
                $i=$this->factura->id;
                $mensaje="Facturación actualizada satisfactoriamente";
            } else {
                $i=$this->factura->id;
                $mensaje="Facturación creada satisfactoriamente";
            }

            $fac=Facturacion::updateOrCreate([
                'id'=>$i
                ],
                [
                    'numfactura'=>$this->factura->numfactura,
                    'serie'=>$this->factura->serie,
                    'entidad_id'=>$this->factura->entidad_id,
                    'fechafactura'=>$this->factura->fechafactura,
                    'fechavencimiento'=>$this->factura->fechavencimiento,
                    'metodopago_id'=>$this->factura->metodopago_id,
                    'refcliente'=>$this->factura->refcliente,
                    'mail'=>$this->factura->mail,
                    'enviar'=>$this->factura->enviar,
                    'enviada'=>$this->factura->enviada,
                    'pagada'=>$this->factura->pagada,
                    'facturada'=>$this->factura->facturada,
                    'facturable'=>$this->factura->facturable,
                    'asiento'=>$this->factura->asiento,
                    'fechaasiento'=>$this->factura->fechaasiento,
                    'observaciones'=>$this->factura->observaciones,
                    'notas'=>$this->factura->notas,
                ]
            );
            $this->emitSelf('notify-saved');
        }
    }

    public function agregarconcepto(FacturacionConcepto $concepto){
        if($this->factura->id){
            $c=FacturaConceptoStoreAction::execute($this->factura,$concepto);
            $this->emit('detallerefresh');
        }else{
            $this->dispatchBrowserEvent('notifyred', 'Debes crear la Pre-factura primero');
        }
    }

    public function presentaPDF(Facturacion $factura){
        return Response::download('storage/'.$factura->rutafichero);
    }

    public function creafactura(Facturacion $factura)
    {
        $this->validate([
            'factura.id'=>'required',
            'factura.metodopago'=>'required',
        ]);

        $serie= !$factura->serie ? substr($factura->fechafactura->format('Y'), -2) : $factura->serie;
        $factura->metodopago_id= !$factura->metodopago_id ? '1' : $factura->metodopago_id;

        if (!$factura->numfactura){
            $fac=Facturacion::where('serie', $serie)->max('numfactura') ;
            $fac= $fac ? $fac + 1 : ($serie * 100000 +1) ;
        }else{
            $fac=$factura->numfactura;
        }

        $factura->ruta='facturas/'.$serie.'/'.$factura->fechafactura->format('m');
        $factura->fichero=(trim('Fra_Suma_'.$factura->serie.'_'.substr ( $fac ,-5 ).'_'.substr ( $factura->entidad->entidad ,0,6 ),' ').'.pdf');

        $factura->serie=$serie;
        $factura->numfactura=$fac;
        $factura->facturada=true;
        $factura->save();
        // genero la factura y la guardo en su carpeta de storage
        $factura->imprimirfactura();
        $this->nf=$factura->serie.'-'.substr($fac,-5);
        $this->dispatchBrowserEvent('notify', 'La factura ha sido creada!');
        $this->redirect( route('facturacion.edit',$factura) );
        // $this->emit('facturaupdate');
    }

    // public function imprimeFacturaLocal(Facturacion $factura)
    // {
    //     $factura->imprimirFacturaLocal();
    // }


    public function delete($facturacionId)
    {
        $facturaBorrar = Facturacion::find($facturacionId);

        if ($facturaBorrar) {
            $facturaBorrar->delete();
            $this->dispatchBrowserEvent('notify', 'La factura ha sido eliminada!');
        }
    }

}
