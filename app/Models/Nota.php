<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'notas';
    protected $fillable = ['titulo', 'extracto', 'contenido', 'slug', 'imagen_destacada', 'fecha', 'estatus', 'categoria_id', 'user_id'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function categoria()
    {
    	return $this->categoria(Categoria::class);
    }

    public function getStatusAttribute()
    {
    	$estatus = ($this->estatus == 1) ? 'Publicado' : 'Borrador';
    	return $estatus;
    }

    public function getImagenAttribute()
    {
    	return \Storage::url($this->imagen_destacada);
    }
}
