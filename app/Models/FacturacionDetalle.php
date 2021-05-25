<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturacionDetalle extends Model
{
    use HasFactory;

    protected $fillable=['facturacion_id','orden','tipo','concepto','unidades','coste','iva','subcuenta','pagadopor'];

    public function factura()
    {
        return $this->belongsTo(Facturacion::class);
    }
}
