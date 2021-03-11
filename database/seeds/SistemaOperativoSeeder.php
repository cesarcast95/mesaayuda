<?php

use Illuminate\Database\Seeder;

class SistemaOperativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        $states=[
            'N/A',
            'Windows 10',
            'Windows 7',
            'Windows 8',
            'Linus'
        ];
        foreach($states as $key => $value){
            DB::table('os')->insert([
                'name' => $value,
            ]);
        }
    }
}
