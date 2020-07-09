<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EspacioEspecifico extends Model
{
    protected $fillable = [
        'empresa_id','nombre_espacio', 'tipo_espacio_id', 'desc_espacio', 
    ];
}
