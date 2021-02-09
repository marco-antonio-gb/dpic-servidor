<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaPostgraduanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_postgraduante', function (Blueprint $table) {
            $table->id('idMateria_postgraduante');
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')->references('idMateria')->on('materias');
            $table->unsignedBigInteger('postgrado_id');
            $table->foreign('postgrado_id')->references('idPostgrado')->on('postgrados');
            $table->unsignedBigInteger('postgraduante_id');
            $table->foreign('postgraduante_id')->references('idPostgraduante')->on('postgraduantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materia_postgraduante');
    }
}
