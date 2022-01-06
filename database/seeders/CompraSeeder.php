<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedors')->insert([
            'nombre'=>('Diedrich Automotores'),
            'direccion'=>('Av. justo jose de
            urquiza'),
            'telefono'=>('74664893'),
            'email'=>('DiedrichAut@gmail.com')
        ]);
        DB::table('proveedors')->insert([
            'nombre'=>('SMX Automotors'),
            'direccion'=>('Doble via la Guardia'),
            'telefono'=>('74629902'),
            'email'=>('SMXAuto@gmail.com')
        ]);
        DB::table('proveedors')->insert([
            'nombre'=>('General Automotors'),
            'direccion'=>('Doble via la Guardia'),
            'telefono'=>('79412098'),
            'email'=>('GeneralAutomotors@gmail.com')
        ]);
        DB::table('proveedors')->insert([
            'nombre'=>('Importadora Gutierrez'),
            'direccion'=>('Radial 17 1/2'),
            'telefono'=>('75489745'),
            'email'=>('ImportadoraGutierrez@gmail.com')
        ]);
        DB::table('proveedors')->insert([
            'nombre'=>('Autoventa GX Grupo Xero'),
            'direccion'=>('Av. Olimpica'),
            'telefono'=>('74593029'),
            'email'=>('AutoGXGrupoXero@gmail.com')
        ]);
        DB::table('proveedors')->insert([
            'nombre'=>('Carmax'),
            'direccion'=>('Av. Grigota'),
            'telefono'=>('74698378'),
            'email'=>('ConcesionarioCarmax@gmail.com')
        ]);
        DB::table('proveedors')->insert([
            'nombre'=>('AutoVenta Pantanera'),
            'direccion'=>('Av. Cristo Redentor'),
            'telefono'=>('72398530'),
            'email'=>('AutoPantanera@gmail.com')
        ]);
    }
}
