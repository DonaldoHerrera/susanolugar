<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspacioEspecificosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espacio_especificos', function (Blueprint $table) {
            $table->id();
            $table->integer('empresa_id');
            $table->string('nombre_espacio');
            $table->integer('tipo_espacio_id');
            $table->text('desc_espacio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espacio_especificos');
    }
}
