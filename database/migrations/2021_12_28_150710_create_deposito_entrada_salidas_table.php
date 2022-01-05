<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositoEntradaSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposito_entrada_salidas', function (Blueprint $table) {
            $table->id();
            $table->string('accion');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('almacen_id');
            $table->timestamps();

            $table->foreign('almacen_id')->on('almacens')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposito_entrada_salidas');
    }
}
