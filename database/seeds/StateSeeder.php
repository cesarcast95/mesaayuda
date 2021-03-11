<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states=[
            'Reportada',
            'Asignada',
            'Atendida'
        ];
        foreach($states as $key => $value){
            DB::table('state')->insert([
                'name' => $value,
                'description' => 'Esto es de prueba'
            ]);
        }
    }
}
