<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    use HasFactory;

    protected $table = 'ciclos';

    protected $fillable=['id','ciclo'];

    public function facturacionconceptos()
    {
        return $this->hasMany(FacturacionConcepto::class,'id','ciclo_id');
    }

    public function entidadesimpuesto()
    {
        return $this->hasMany(Entidad::class,'id','cicloimpuesto_id');
    }

}
