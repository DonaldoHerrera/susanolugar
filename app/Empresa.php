<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{
    protected $fillable = [
        'user_id','nombre_emp', 'descripcion_emp', 'sitio_web', 'facebook','instagram','twitter','latitud','longitud','tipo_empresa',
    ];
}
