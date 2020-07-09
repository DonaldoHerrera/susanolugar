<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposEspaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_espacios', function (Blueprint $table) {
            $table->id();
            $table->string('cuarto');
            $table->string('salon');
            $table->string('oficina');
            $table->string('laboratorio');
            $table->string('bodega');
            $table->string('otro');
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
        Schema::dropIfExists('tipos_espacios');
    }
}
