<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicionMaquinasfs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicionMaquinasfs', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_maquina')->references('id')->on('maquinas');
            $table->unsignedBigInteger('id_medicion')->references('id')->on('medicion_filetes');
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
        Schema::dropIfExists('medicion_maquinasf');

    }
}
