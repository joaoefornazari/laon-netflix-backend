<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\MediaRate;
use App\Models\Reviewer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MediaRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $allMedia = Media::all();

			foreach ($allMedia as $media) {
				$mediaRate = new MediaRate();
				$mediaRate->media_id = $media->id;
				$mediaRate->reviewer_id = Reviewer::all()->random()->id;
				$mediaRate->rate = Faker::create()->randomFloat(2, 0, 10);
				$mediaRate->save();
			}
    }
}
