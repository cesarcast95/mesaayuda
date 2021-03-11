<?php

use Illuminate\Database\Seeder;

class StateDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states=[
            'Bueno',
            'Malo',
            'Regular'
        ];
        foreach($states as $key => $value){
            DB::table('state_device')->insert([
                'name' => $value,
            ]);
        }
    }
}

