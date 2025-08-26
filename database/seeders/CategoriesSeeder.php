<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; 

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Action']);
        Category::create(['name' => 'Drama']);
        Category::create(['name' => 'Comedy']);
        Category::create(['name' => 'Horror']);
        Category::create(['name' => 'Romance']);
        Category::create(['name' => 'Sci-Fi']);
        Category::create(['name' => 'Documentary']);
        Category::create(['name' => 'Thriller']);
        Category::create(['name' => 'Fantasy']);
        Category::create(['name' => 'Animation']);
    }
}
