<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jaulas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaulas', function(Blueprint $table){
            $table->id();
            $table->string('nombre_jaula');
            $table->string('numero');
            $table->unsignedBigInteger('empresa')->references('id')->on('empresas')->onDelete('cascade');
            $table->unsignedBigInteger('centro')->references('id')->on('centros')->onDelete('cascade');
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
        Schema::dropIfExists('users');

    }
}
