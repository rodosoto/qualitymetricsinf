<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicionPeces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicionPeces', function(Blueprint $table){
            $table->id();
            $table->string('sectionCod');
            $table->string('barCode');
            $table->unsignedBigInteger('centro')->references('id')->on('centros');
            $table->unsignedBigInteger('jaula')->references('id')->on('jaulas');
            $table->string('madurez');
            $table->string('deformidad');
            $table->double('longPez');
            $table->double('areaPez');
            $table->double('areaHerida');
            $table->integer('ptosHerida');
            $table->double('areaPet');
            $table->integer('ptosPet');
            $table->json('mapaCoordPez');
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
        Schema::dropIfExists('medicion_peces');

    }
}
