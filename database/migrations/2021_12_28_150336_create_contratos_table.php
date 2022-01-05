<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->date('fecha');
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('tipo_contrato_id');
            $table->timestamps();

            $table->foreign('venta_id')->on('ventas')->references('id')->onDelete('cascade');
            $table->foreign('tipo_contrato_id')->on('tipo_contratos')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
