<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuario Admin
        //empleado
        DB::table('personas')->insert([
            'ci'=>('4859852'),
            'nombre'=>('Admin'),
            'email'=>('admin@gmail.com'),
            'direccion'=>('AV. Santos Dumount nº352'),
            'telefono'=>('78941658'),
            'tipo'=>('1')
        ]);
        //usuario
        DB::table('users')->insert([
            'email'=>('admin@gmail.com'),
            'password'=>bcrypt('123123'),
            'id_persona'=>('1'),
        ]);
        //Usuario encargado
        //empleado
        DB::table('personas')->insert([
            'ci'=>('4654135'),
            'nombre'=>('Encargado'),
            'email'=>('encargado@gmail.com'),
            'direccion'=>('AV. Santos Dumount nº456'),
            'telefono'=>('7852612'),
            'tipo'=>('1')
        ]);
        //usuario
        DB::table('users')->insert([
            'email'=>('encargado@gmail.com'),
            'password'=>bcrypt('321321'),
            'id_persona'=>('2'),
        ]);
        
    }
}
