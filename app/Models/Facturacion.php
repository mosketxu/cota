<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use File;

class Facturacion extends Model
{
    use HasFactory;

    protected $table = 'facturacion';

    // protected $dates = ['fechafactura','fechavencimiento'];

    protected $fillable=['numfactura','serie','entidad_id','fechafactura','fechavencimiento','metodopago_id','refcliente','mail',
    'enviar','enviada','pagada','facturable','asiento','fechaasiento','observaciones','notas'];


    protected $casts = [
        'fechafactura' => 'date:Y-m-d',
        'fechavencimiento' => 'date:Y-m-d',

    ];

    public function metodopago()
    {
        return $this->belongsTo(MetodoPago::class);
    }

    public function facturadetalles()
    {
        return $this->hasMany(FacturacionDetalle::class)->orderBy('tipo')->orderBy('orden');
    }

    public function entidad()
    {
        return $this->belongsTo(Entidad::class);
    }

    public function getDateFraAttribute()
    {
        if ($this->fechafactura) {
            return $this->fechafactura->format('d/m/Y');
        }
    }

    public function getDateVtoAttribute()
    {
        if ($this->fechavencimiento) {
            return $this->fechavencimiento->format('d/m/Y');
        }
    }

    public function getEnviarEstAttribute()
    {
        return [
            '0'=>['red','No'],
            '1'=>['green','Sí']
        ][$this->enviar] ?? ['gray',''];
    }

    public function getEnviadaEstAttribute()
    {
        return [
            '0'=>['red','No'],
            '1'=>['green','Sí']
        ][$this->enviada] ?? ['gray',''];
    }

    public function getPagadaEstAttribute()
    {
        return [
            '0'=>['red','No'],
            '1'=>['green','Sí']
        ][$this->pagada] ?? ['gray',''];
    }

    public function getFacturableEstAttribute()
    {
        return [
            '0'=>['red','No'],
            '1'=>['green','Sí']
        ][$this->facturable] ?? ['gray',''];
    }

    public function getContabilizadaAttribute()
    {
        if ($this->asiento){
            return ['green','Sí'];
        }else{
            return ['red','No'];
        }
    }

    public function getFacturadoAttribute()
    {
        if ($this->numfactura){
            return ['green','Sí'];
        }else{
            return ['red','No'];
        }
    }

    public function scopeImprimirfactura()
    {
        $factura=Facturacion::with('entidad')
        ->with('facturadetalles')
        ->find($this->id);

        $base=$factura->facturadetalles->where('iva', '!=', '0')->sum('base');
        $suplidos=$factura->facturadetalles->where('iva', '0')->sum('base');
        $totaliva=$factura->facturadetalles->sum('totaliva');
        $total=$factura->facturadetalles->sum('total');

        $ruta=(substr($this->fechafactura->format('Y') ,-2).'/'.$this->fechafactura->format('m'));
        $fichero='Fra_Suma_'.$factura->serie.'_'.substr ( $factura->numfactura ,-5 ).'_'.substr ( $factura->entidad->entidad ,0,10 ) ;

        $pdf = \PDF::loadView('facturacion.facturapdf', compact(['factura','base','suplidos','totaliva','total']));

        Storage::put('public/facturas/'.$ruta.'/'.$fichero.'.pdf', $pdf->output());

        return $pdf->download($fichero.'.pdf');
    }
}
