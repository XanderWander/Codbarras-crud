<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class herramientas extends Model
{
    use HasFactory;

    protected $table = 'herramientas';

    protected $fillable = [
        'Nombre',
        'Categoria',
        'Descripcion'
    ];
}
