<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postgrados', function (Blueprint $table) {
            $table->id('idPostgrado');
            $table->string('nombre');
            $table->date('fecha_inicio');
            $table->integer('cantidad_pagos');
            $table->integer('precio');
            $table->string('gestion');
            $table->unsignedBigInteger('nivel_id');
            $table->foreign('nivel_id')->references('idNivel')->on('niveles');
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
        Schema::dropIfExists('postgrados');
    }
}
