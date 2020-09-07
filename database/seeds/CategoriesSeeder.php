<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'un-categories', 'status' => 1]);
        Category::create(['name' => 'Natural', 'status' => 1]);
        Category::create(['name' => 'Flowers', 'status' => 1]);
        Category::create(['name' => 'Kitchen', 'status' => 0]);
    }
}
