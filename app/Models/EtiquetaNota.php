<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtiquetaNota extends Model
{
    use HasFactory;
	protected $table = 'etiquetas_notas';
    protected $fillable = ['nota_id', 'etiqueta_id'];
}
