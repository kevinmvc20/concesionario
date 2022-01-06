<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert([              
            'ci'=>('12487563'),
            'nombre'=>('Mariela colodro Barrios'),
            'email'=>('MarielaCB@gmail.com'),
            'direccion'=>('Barrio Equipetrol'),
            'telefono'=>('79364218'),
            'tipo'=>('2'),
        ]);
        DB::table('clientes')->insert([
            'id_persona'=>('3')
        ]);
        DB::table('personas')->insert([              
            'ci'=>('54653218'),
            'nombre'=>('Jose Melendres Castro'),
            'email'=>('JoseMC@gmail.com'),
            'direccion'=>('Av. Santos Dumont'),
            'telefono'=>('75609234'),
            'tipo'=>('2'),
        ]);
        DB::table('clientes')->insert([
            'id_persona'=>('4')
        ]);
        DB::table('personas')->insert([              
            'ci'=>('78965432'),
            'nombre'=>('Luisa Ramirez Corin'),
            'email'=>('LuisaRC@gmail.com'),
            'direccion'=>('Barrio Flamingo'),
            'telefono'=>('70985182'),
            'tipo'=>('2'),
        ]);
        DB::table('clientes')->insert([
            'id_persona'=>('5')
        ]);
        DB::table('personas')->insert([              
            'ci'=>('21456354'),
            'nombre'=>('Rodolfo Soliz Rojas'),
            'email'=>('RodolfoSR@gmail.com'),
            'direccion'=>('Barrio Fabril'),
            'telefono'=>('75409754'),
            'tipo'=>('2'),
        ]);
        DB::table('clientes')->insert([
            'id_persona'=>('6')
        ]);
    }
}
