<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntidadTipo extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['entidadtipo'];

    public function entidades()
    {
        return $this->hasMany(Entidad::class);
    }

}
