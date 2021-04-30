<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pu extends Model
{
    use HasFactory;

    protected $fillable=['destino','url','us','us2','ps','observaciones'];

    public function entidad()
    {
        return $this->belongsTo(Entidad::class);
    }
}
