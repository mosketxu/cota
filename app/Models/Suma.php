<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suma extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','tfno','email'];

    public function entidades()
    {
        return $this->hasMany(Entidad::class);
    }
}
