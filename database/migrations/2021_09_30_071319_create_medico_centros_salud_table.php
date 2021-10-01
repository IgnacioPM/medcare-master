<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicoCentrosSaludTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico_centros_salud', function (Blueprint $table) {
            $table->integer('idmedico_centros_salud')->primary();
            $table->integer('idusuario')->nullable();
            $table->integer('idcentros_salud')->nullable();
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
        Schema::dropIfExists('medico_centros_salud');
    }
}
