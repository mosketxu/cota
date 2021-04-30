<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['pais'];

    public function entidades()
    {
        return $this->hasMany(Entidad::class,'pais_id');
    }
}
