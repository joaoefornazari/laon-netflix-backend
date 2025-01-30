<?php

namespace Database\Seeders;

use App\Models\PersonRole;
use Illuminate\Database\Seeder;

class PersonRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonRole::factory()->count(96)->create();
    }
}
