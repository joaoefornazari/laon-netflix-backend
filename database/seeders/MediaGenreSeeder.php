<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Media;
use App\Models\MediaGenre;
use Illuminate\Database\Seeder;

class MediaGenreSeeder extends Seeder
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
				$mediaGenre = new MediaGenre();
				$mediaGenre->media_id = $media->id;
				$mediaGenre->genre_id = Genre::all()->random()->id;
				$mediaGenre->save();
			}
    }
}
