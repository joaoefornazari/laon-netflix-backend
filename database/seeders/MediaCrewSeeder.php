<?php

namespace Database\Seeders;

use App\Models\MediaCrew;
use Illuminate\Database\Seeder;

class MediaCrewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			MediaCrew::factory()->count(60)->create();
    }
}
