<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoEntidad extends Model
{
    use HasFactory;

    protected $table = 'contacto_entidades';

    protected $fillable = ['entidad_id','contacto_id','departamento','comentarios'];

    public function entidades(){
        return $this->hasMany(Entidad::class,'contacto_id');
    }
}
