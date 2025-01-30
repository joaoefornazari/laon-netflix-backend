<?php

namespace Database\Seeders;

use App\Models\Reviewer;
use Illuminate\Database\Seeder;

class ReviewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reviewer::factory()->count(4)->create();
    }
}
