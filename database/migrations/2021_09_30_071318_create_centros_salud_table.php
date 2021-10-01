<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentrosSaludTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros_salud', function (Blueprint $table) {
            $table->integer('idcentros_salud')->primary();
            $table->string('nombre', 100)->nullable();
            $table->string('descripcion', 300)->nullable();
            $table->string('imagen', 300)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->string('telefono', 45)->nullable();
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
        Schema::dropIfExists('centros_salud');
    }
}
