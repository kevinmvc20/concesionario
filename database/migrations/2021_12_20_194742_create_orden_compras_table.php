<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_compras', function (Blueprint $table) {
            $table->id();
            $table->float('precio_unitario',10,2);
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('compra_id');
            $table->unsignedBigInteger('vehiculo_id');
            $table->timestamps();
            $table->foreign('proveedor_id')->on('proveedors')->references('id')->onDelete('cascade');
            $table->foreign('compra_id')->on('compras')->references('id')->onDelete('cascade');           
            $table->foreign('vehiculo_id')->on('vehiculos')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_compras');
    }
}
