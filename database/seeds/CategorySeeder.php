<?php

use App\Models\CategoryHardware;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CategoryHardware::class)->times(10)->create();
    }
}
