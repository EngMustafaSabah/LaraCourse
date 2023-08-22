<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use App\Models\Category;
// use Illuminate\Support\Integer;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::factory(10)->create();
    }
}
