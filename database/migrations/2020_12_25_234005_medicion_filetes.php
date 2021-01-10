<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicionFiletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicionFiletes', function(Blueprint $table){
            $table->id();
            $table->string('sectionCod');
            $table->string('barCode');
            $table->unsignedBigInteger('centro')->references('id')->on('centros');
            $table->unsignedBigInteger('jaula')->references('id')->on('jaulas');
            $table->integer('colorEntero');
            $table->integer('colorLomo');
            $table->integer('colorBelly');
            $table->integer('colorNCQ');
            $table->double('longFilete');
            $table->double('areaFilete');
            $table->double('areaGap');
            $table->integer('ptosGap');
            $table->double('areaMel');
            $table->integer('ptosMel');
            $table->double('areaHem');
            $table->integer('puntosHem');
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
        Schema::dropIfExists('medicion_filetes');

    }
}
