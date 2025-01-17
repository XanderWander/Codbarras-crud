<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class prototipo extends Model
{
    use HasFactory;

    protected $table = 'prototipo';

    protected $fillable = [
        'Serial',
        'Modelo',
        'Categoria',
        'Caracteristicas',
        'Observaciones',
    ];

}
