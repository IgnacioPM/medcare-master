<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtencionMedicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atencion_medica', function (Blueprint $table) {
            $table->integer('idatencion_medica')->primary();
            $table->integer('idusuario')->nullable();
            $table->integer('idmedico')->nullable();
            $table->string('fecha_atencion', 50)->nullable();
            $table->string('hora_atencion', 50)->nullable();
            $table->integer('idcentro_salud')->nullable();
            $table->string('mensaje', 300)->nullable();
            $table->float('precio')->nullable();
            $table->integer('confirmado')->nullable();
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
        Schema::dropIfExists('atencion_medica');
    }
}
