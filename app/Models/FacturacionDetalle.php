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

}
