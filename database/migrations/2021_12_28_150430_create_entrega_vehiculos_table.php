<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregaVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('contrato_id');
            $table->timestamps();

            $table->foreign('contrato_id')->on('contratos')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_vehiculos');
    }
}
