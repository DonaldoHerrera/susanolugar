<?php

use Illuminate\Database\Seeder;
use App\TiposEspacio;

class TipoEspaciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TiposEspacio::create([
            'nombre_espacio'=>'Cuarto',
        ]);
        TiposEspacio::create([
            'nombre_espacio'=>'Salon',
        ]);
        TiposEspacio::create([
            'nombre_espacio'=>'Oficina',
        ]);
        TiposEspacio::create([
            'nombre_espacio'=>'Laboratorio',
        ]);
        TiposEspacio::create([
            'nombre_espacio'=>'Bodega',
        ]);
        TiposEspacio::create([
            'nombre_espacio'=>'Otro',
        ]);
    }
}
