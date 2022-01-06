<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tipo de almacen
        DB::table('tipo_almacens')->insert([
            'tipo'=>('Concesionario')
        ]);
        DB::table('tipo_almacens')->insert([
            'tipo'=>('Deposito')
        ]);
        //almacen
        DB::table('almacens')->insert([
            'stock'=>('0'),
            'tipo_almacen_id'=>('1')
        ]);
        DB::table('almacens')->insert([
            'stock'=>('0'),
            'tipo_almacen_id'=>('2')
        ]);
    }
}
