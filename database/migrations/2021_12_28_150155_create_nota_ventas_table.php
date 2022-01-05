<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_ventas', function (Blueprint $table) {
            $table->id();
            $table->float('precio_unitario',11,2);
            $table->unsignedBigInteger('vehiculo_id');
            $table->unsignedBigInteger('venta_id');
            $table->timestamps();

            $table->foreign('vehiculo_id')->on('vehiculos')->references('id')->onDelete('cascade');
            $table->foreign('venta_id')->on('ventas')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_ventas');
    }
}
