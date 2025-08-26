<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Series;
use App\Models\Category;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get all categories
             $categories = Category::all();

        // create 5 series
        for ($i = 1; $i <= 5; $i++) {
            $series = Series::create([
                'title' => "Series $i",
                'description' => "Description for Series $i",
                'status' => 'active',
                'cover_image' => null
            ]);

            // attach 2 random categories to each series since it's a many-to-many relationship
            $series->categories()->attach(
                $categories->random(2)->pluck('id')->toArray()
            );
        }

    }
}
