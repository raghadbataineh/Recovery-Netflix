<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Series;
use App\Models\Episode;

class EpisodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $allSeries = Series::all();
            foreach ($allSeries as $series) {
                for ($i = 1; $i <= 6; $i++) {
                    Episode::create([
                        'series_id' => $series->id,
                        'title' => "Episode $i of " . $series->title,
                        'description' => "Description for Episode $i of " . $series->title,
                        'video_url' => "https://example.com/videos/{$series->id}_episode_$i.mp4",
                        'duration' => rand(20, 60), // random duration between 20 to 60 minutes
                         'release_date' => now()->subDays(rand(1, 100)), // random release date within the last 100 days


                    ]);
                }
            }

    }
}
