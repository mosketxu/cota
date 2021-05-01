<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoEntidad extends Model
{
    use HasFactory;

    protected $table = 'contacto_entidades';

    protected $fillable = ['departamento','observaciones'];

    public function entidades(){
        return $this->hasMany(Entidad::class,'contacto_id');
    }
}
