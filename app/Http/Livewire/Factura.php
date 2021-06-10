<?php

namespace App\Http\Livewire;

use App\Models\{Entidad, Facturacion, MetodoPago};
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Factura extends Component
{

    public $factura;
    public $mostrarGenerar=0;
    public $nf;

    protected $listeners = [
        'facturaupdate' => '$refresh',
    ];

    protected function rules(){
        return [
            'factura.id'=>'nullable',
            'factura.numfactura'=>'nullable',
            'factura.serie'=>'nullable',
            // 'factura.invento'=>'string|nullable',
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
        ];
    }

    public function mount(Facturacion $facturacion)
    {
        $this->factura=$facturacion;
        $this->factura->enviar=1;
        $this->factura->enviada=0;
        $this->factura->pagada=0;
        $this->factura->facturable=1;
        $this->nf=$this->factura->numfactura ? $this->factura->serie.'-'.substr($this->factura->numfactura,-5) :'';

    }

    public function render()
    {
        $factura=$this->factura;

        // $this->mostrarGenerar=0;
        if($factura->id){
            if(!$factura->numfactura){
                $this->mostrarGenerar=1;
            }
        }

        $entidades=Entidad::where('estado','1')->orderBy('entidad')->get();
        $pagos=MetodoPago::all();
        return view('livewire.factura',compact('entidades','pagos','factura'));
    }

    public function save()
    {

        $this->validate();
        if($this->factura->id){
            $i=$this->factura->id;
            $mensaje="Factura actualizada satisfactoriamente";
        }else{
            $i=$this->factura->id;
            $mensaje="Factura creada satisfactoriamente";
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
                'facturable'=>$this->factura->facturable,
                'asiento'=>$this->factura->asiento,
                'fechaasiento'=>$this->factura->fechaasiento,
                'observaciones'=>$this->factura->observaciones,
                'notas'=>$this->factura->notas,
            ]
        );

        $this->emitSelf('notify-saved');

        if(!$i){
            $this->factura->id=$fac->id;
            $this->redirect( route('facturacion.edit',$fac) );
        }

    }

    public function creafactura(Facturacion $factura)
    {
        $this->validate([
            'factura.id'=>'required',
            'factura.metodopago'=>'required',
        ]);

        if (!$factura->serie ) $factura->serie=substr(now()->format('Y'),-2);

        $fac=Facturacion::where('serie',$factura->serie)->max('numfactura') ;
        $fac= $fac ? $fac + 1 : ($factura->serie * 100000 +1) ;
        // $factura->serie=$factura->serie;
        $factura->numfactura=$fac;
        $factura->save();
        $factura->imprimirfactura();
        $this->nf=$factura->serie.'-'.substr($fac,-5);
        $this->redirect( route('facturacion.edit',$factura) );
        // $this->emit('facturaupdate');
        $this->dispatchBrowserEvent('notify', 'La factura ha sido creada!');

    }

    public function imprimeFacturaLocal(Facturacion $factura)
    {
        $factura->imprimirFacturaLocal();
    }

    public function delete($facturacionId)
    {
        $facturaBorrar = Facturacion::find($facturacionId);

        if ($facturaBorrar) {
            $facturaBorrar->delete();
            $this->dispatchBrowserEvent('notify', 'La factura ha sido eliminada!');
        }
    }

}
