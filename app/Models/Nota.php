<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'notas';
    protected $fillable = ['titulo', 'extracto', 'contenido', 'slug', 'imagen_destacada', 'fecha', 'estatus', 'categoria_id', 'user_id'];
}
