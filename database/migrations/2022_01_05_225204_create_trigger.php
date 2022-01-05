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
        create function compra_cant() returns Trigger as
        $$
        begin
            update "compras" set compras.cantidadtotal=compras.cantidadtotal+1 where compras.id = NEW.compra_id;
            return new;
        End
        $$
        

        create trigger cantidad_compras after insert on orden_compras
        for each row 
        execute procedure compra_cant();
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER cantidad_compras ON orden_compras ');
    }
}
