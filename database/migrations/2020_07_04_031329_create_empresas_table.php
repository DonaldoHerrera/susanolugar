<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nombre_emp');
            $table->text('descripcion_emp');
            $table->string('sitio_web');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->double('latitud');
            $table->double('longitud');
            $table->string('tipo_empresa');
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
        Schema::dropIfExists('empresas');
    }
}
