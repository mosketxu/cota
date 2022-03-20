<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturacionDetalle extends Model
{
    use HasFactory;

    protected $fillable=['facturacion_id','orden','tipo','concepto','unidades','coste','iva','subcuenta','pagadopor'];

    const TIPOS =[
        '0'=>'General',
        '1'=>'Suplido',
        '2'=>'Otros',
    ];

    public function factura()
    {
        return $this->belongsTo(Facturacion::class);
    }

    public function getTipofraAttribute()
    {
        return [
            '0'=>'Gral',
            '1'=>'Suplido',
            '2'=>'Otros'
        ][$this->tipo] ?? '0';
    }

    public function getBaseAttribute(){
        return $this->iva!=0 ? round($this->unidades*$this->coste,2) : 0;
    }

    public function getExentaAttribute(){
        return $this->iva==0 ? round($this->unidades*$this->coste,2) : 0;
    }

    public function getPorAttribute(){
        if($this->pagadopor=='1')
            return 'Marta';
        elseif($this->pagadopor=='2')
            return 'Susana';
        else
            return 'NP';
    }

    public function getTotalivaAttribute(){
        return round($this->unidades*$this->coste*$this->iva,2);
    }
    public function getTotalAttribute(){
        return round((1+$this->iva)*$this->unidades*$this->coste,2);
        // return number_format(round((1+$this->iva)$this->unidades*$this->coste,2),2);
    }


}
