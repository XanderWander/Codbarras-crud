<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class componentes extends Model
{
    use HasFactory;

    protected $table = 'component';

    protected $fillable = [
        'Serial',
        'Categoria',
        'Nombre',
        'Observaciones', 
        'Caracteristicas'
    ];
}
