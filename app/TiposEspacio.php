<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposEspacio extends Model
{
    protected $fillable = [
        'cuarto','salon', 'oficina', 'laboratorio', 'bodega','otro',
    ];
}
