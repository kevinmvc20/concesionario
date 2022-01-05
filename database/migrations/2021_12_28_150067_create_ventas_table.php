<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->float('subtotal',11,2);            
            $table->string('descripcion')->nullable();
            $table->integer('cantidad');
            $table->date('fecha');
            $table->string('codigo_venta');
            $table->unsignedBigInteger('empleado_cliente_id');
            $table->timestamps();

            $table->foreign('empleado_cliente_id')->on('empleadoclientes')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
