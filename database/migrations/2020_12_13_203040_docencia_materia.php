<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocenciaMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_materia', function (Blueprint $table) {
            $table->id('docente_materia_id');
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')->references('idMateria')->on('materias');
            $table->unsignedBigInteger('docente_id');
            $table->foreign('docente_id')->references('idUsuario')->on('usuarios');
            $table->unsignedBigInteger('postgrado_id');
            $table->foreign('postgrado_id')->references('idPostgrado')->on('postgrados');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente_materia');

    }
}
