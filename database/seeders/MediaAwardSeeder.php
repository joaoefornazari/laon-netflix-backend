<?php

namespace Database\Seeders;

use App\Models\MediaAward;
use Illuminate\Database\Seeder;

class MediaAwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      MediaAward::factory()->count(16)->create();
    }
}
