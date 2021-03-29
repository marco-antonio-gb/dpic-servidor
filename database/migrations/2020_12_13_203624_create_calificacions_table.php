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
            $table->timestamp('fecha_registro')->useCurrent = true;
            $table->boolean('estado')->default(false);
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')->references('idMateria')->on('materias')->onDelete('cascade');;
            $table->unsignedBigInteger('docente_id');
            $table->foreign('docente_id')->references('idUsuario')->on('usuarios')->onDelete('cascade');;
            $table->unsignedBigInteger('postgrado_id');
            $table->foreign('postgrado_id')->references('idPostgrado')->on('postgrados')->onDelete('cascade');;
            $table->unsignedBigInteger('postgraduante_id');
            $table->foreign('postgraduante_id')->references('idPostgraduante')->on('postgraduantes')->onDelete('cascade');;
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
