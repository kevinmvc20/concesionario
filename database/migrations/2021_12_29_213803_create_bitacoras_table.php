<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->string('apartado')->nullable();
            $table->string('accion');
            $table->string('implicado')->nullable();
            $table->dateTime('fecha');
            $table->unsignedBigInteger('id_user');
            $table->string('nombre_usuario');
            $table->timestamps();
            $table->foreign('id_user')->on('users')->references('id')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacoras');
    }
}
