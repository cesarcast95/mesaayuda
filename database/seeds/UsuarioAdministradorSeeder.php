<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'cesar',
            'email' => 'cesarzc95@gmail.com',
            'password' => bcrypt('cesarc95')
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id' => 1,
            'user_id' => 1,
        ]);

    }
}
