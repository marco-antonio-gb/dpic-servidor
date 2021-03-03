<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones_requisitos', function (Blueprint $table) {
            $table->id('idInscripcionRequisito');
            $table->boolean('estado')->default(true);
            $table->date('fecha_registro');
            $table->unsignedBigInteger('postgrado_id');
            $table->foreign('postgrado_id')->references('idPostgrado')->on('postgrados');
            $table->unsignedBigInteger('postgraduante_id');
            $table->foreign('postgraduante_id')->references('idPostgraduante')->on('postgraduantes');
            $table->unsignedBigInteger('requisito_id');
            $table->foreign('requisito_id')->references('idRequisito')->on('requisitos');
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
        Schema::dropIfExists('inscripcion__requisitos');
    }
}
