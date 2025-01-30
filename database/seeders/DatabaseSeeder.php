<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
					UserSeeder::class,
					RoleSeeder::class,
					PersonSeeder::class,
					PersonRoleSeeder::class,
					AwardSeeder::class,
					MediaSeeder::class,
					GenreSeeder::class,
					ReviewerSeeder::class,
					MediaGenreSeeder::class,
					MediaCrewSeeder::class,
					MediaAwardSeeder::class,
					MediaRateSeeder::class,
				]);
    }
}
