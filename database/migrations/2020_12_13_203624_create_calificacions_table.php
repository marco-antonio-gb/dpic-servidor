<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id('idCalificacion');
            $table->integer('nota_numerica')->default(0);
            $table->string('nota_literal')->default("CERO");
            $table->string('observacion')->nullable();
            $table->date('fecha_registro')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('estado')->default(false);
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')->references('idMateria')->on('materias');
            $table->unsignedBigInteger('docente_id');
            $table->foreign('docente_id')->references('idUsuario')->on('usuarios');
            $table->unsignedBigInteger('postgrado_id');
            $table->foreign('postgrado_id')->references('idPostgrado')->on('postgrados');
            $table->unsignedBigInteger('postgraduante_id');
            $table->foreign('postgraduante_id')->references('idPostgraduante')->on('postgraduantes');
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

        Schema::dropIfExists('calificaciones');
    }
}
