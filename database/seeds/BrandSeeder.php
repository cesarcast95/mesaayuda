<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand=[
            'LG',
            'Samsung',
            'Asus',
            'HP',
        ];
        foreach($brand as $key => $value){
            DB::table('brand')->insert([
                'name' => $value,
            ]);
        }
    }
}
