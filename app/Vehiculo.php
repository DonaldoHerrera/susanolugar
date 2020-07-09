<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = [
        'empresa_id','placas', 'num_economico', 'nombre_vehiculo','tipo_vehiculo',
    ];
}
