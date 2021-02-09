<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('idPago');
            $table->integer('monto');
            $table->string('boleta');
            $table->date('fecha_cobro');
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
        Schema::dropIfExists('pagos');
    }
}
