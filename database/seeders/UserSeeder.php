<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Persona;
use App\Models\Empleado;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'ci' => '12345678',
            'nombre' => 'admin',
            'tipo' => '1'
        ]);

        User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123'),
            'id_persona' => '1'
        ])->assignRole('Admin');

        Empleado::create([
            'usuario_id'=>'1'
        ]);
    }
}
