<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicacionUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'tituloEvento',
        'tematicaEvento',
        'enlaceEvento',
        'fechaEvento',
        'descripcion'
    ];
}
