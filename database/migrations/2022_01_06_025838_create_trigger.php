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
                UPDATE compras SET compras.cantidadtotal=cantidadtotal+1 WHERE 
                compras.id=NEW.compra_id;
            END
        ');

        DB::unprepared('
        CREATE TRIGGER crear_empleado AFTER INSERT ON users FOR EACH ROW
            BEGIN
                INSERT empleados SET empleados.usuario_id = NEW.id;
            END
        ');

        DB::unprepared('
        CREATE TRIGGER vehiculo_disponible AFTER INSERT ON orden_compras FOR EACH ROW
            BEGIN
                UPDATE vehiculos SET vehiculos.estado="disponible" WHERE vehiculos.id= NEW.vehiculo_id;
            END
        ');

        DB::unprepared('
        CREATE TRIGGER vehiculo_vendido AFTER INSERT ON nota_ventas FOR EACH ROW
            BEGIN
                UPDATE vehiculos SET vehiculos.estado="vendido" WHERE vehiculos.id= NEW.vehiculo_id;
            END
        ');

        DB::unprepared('
        CREATE TRIGGER cantidad_ventas AFTER INSERT ON nota_ventas FOR EACH ROW
            BEGIN
                UPDATE ventas SET ventas.cantidad=ventas.cantidad+1 WHERE ventas.id=NEW.venta_id;
            END
        ');

        DB::unprepared('
        CREATE TRIGGER aumentar_stock AFTER INSERT ON vehiculos FOR EACH ROW
            BEGIN
                UPDATE almacens SET almacens.stock=almacens.stock+1 WHERE almacens.id=NEW.almacen_id;
            END
        ');

        //DB::unprepared('
        //CREATE TRIGGER almacen_salida AFTER INSERT ON nota_ventas FOR EACH ROW
        //    BEGIN
        //        UPDATE almacens SET almacens.stock=almacens.stock-1 WHERE NEW.vehiculo_id = vehiculos.id and almacens.id=vehiculos.almacen_id;
        //    END
        //');

        // DB::unprepared('
        // CREATE TRIGGER descripcion_contrato AFTER INSERT ON contratos FOR EACH ROW
        //     BEGIN
        //     IF NEW.descripcion=`` THEN
        //         UPDATE contratos SET contratos.descripcion="El contrato se registro exitosamente" WHERE contratos.id=NEW.id;
        //     END
        // ');


        DB::unprepared('
        CREATE PROCEDURE nueva_bitacora(apartado varchar(255), accion varchar(255), implicado varchar(255), fecha datetime, id_user bigint(20), nombre_usuario varchar(255))
        BEGIN
            insert into bitacoras(Apartado, accion, implicado,fecha,id_user,nombre_usuario) values(apartado,accion, implicado, fecha, id_user, nombre_usuario);
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
        DB::unprepared('DROP TRIGGER "crear_empleado"');
        DB::unprepared('DROP TRIGGER "vehiculo_disponible"');
        DB::unprepared('DROP TRIGGER "vehiculo_vendido"');
        DB::unprepared('DROP TRIGGER "cantidad_ventas"');
        DB::unprepared('DROP TRIGGER "aumentar_stock"');
        //DB::unprepared('DROP TRIGGER "almacen_salida"');
        //DB::unprepared('DROP TRIGGER "descripcion_contrato"');
        DB::unprepared('DROP PROCEDURE nueva_bitacora');
    }
}
