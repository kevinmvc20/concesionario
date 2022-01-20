<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->dateTime('fecha')->nullable();
            $table->unsignedBigInteger('movimiento_almacen_id');
            $table->unsignedBigInteger('almacen_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('movimiento_almacen_id')->on('movimiento_almacens')->references('id');
            $table->foreign(('almacen_id'))->on('almacens')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_movimientos');
    }
}
