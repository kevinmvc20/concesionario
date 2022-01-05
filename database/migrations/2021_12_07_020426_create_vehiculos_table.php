<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',200);
            $table->decimal('precio',11,2);
            $table->string('color',50);
            $table->integer('año');
            $table->string('estado');
            $table->string('nro_chasis');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('almacen_id');

            $table->timestamps();
            $table->foreign('categoria_id')->on('categorias')->references('id')->onDelete('cascade');
            $table->foreign('marca_id')->on('marcas')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('vehiculos');
    }
}
