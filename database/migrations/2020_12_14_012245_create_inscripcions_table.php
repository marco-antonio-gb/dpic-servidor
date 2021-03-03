<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id('idInscripcion');
            $table->string('gestion');
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
        Schema::dropIfExists('inscripcions');
    }
}
