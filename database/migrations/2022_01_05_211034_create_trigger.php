<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER cantidad_compras AFTER INSERT ON orden_compras FOR EACH ROW
            BEGIN
                UPDATE compras SET compras.cantidadtotal=compras.cantidadtotal+1 WHERE
                compras.id = NEW.compra_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER "cantidad_compras"');
    }
}