<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Maquinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinas', function(Blueprint $table){
            $table->id();
            $table->string('tipo');
            $table->string('modelo');
            $table->string('nombre');
            $table->string('estado');
            $table->timestamp('ultima_medicion');
            $table->unsignedBigInteger('centro')->references('id')->on('centros');
            $table->unsignedBigInteger('jaula')->references('id')->on('jaulas');
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
        Schema::dropIfExists('maquinas');

    }
}
