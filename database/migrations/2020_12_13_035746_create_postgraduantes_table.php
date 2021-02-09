<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostgraduantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postgraduantes', function (Blueprint $table) {
            $table->id('idPostgraduante');
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('nombres');
            $table->string('ci')->unique();
            $table->string('ci_ext');
            $table->string('lugar_nac')->nullable();
            $table->string('fecha_nac')->nullable();
            $table->string('direc_domicilio')->nullable();
            $table->string('nro_domicilio')->nullable();
            $table->string('telf_domicilio')->nullable();
            $table->string('celular')->nullable();
            $table->string('correo')->unique();
            $table->string('profesion')->nullable();
            $table->string('lugar_trabajo')->nullable();
            $table->string('telf_trabajo')->nullable();
            $table->string('lugar_estudio')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamp('fecha_inscripcion')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('estado')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postgraduantes');
    }
}
