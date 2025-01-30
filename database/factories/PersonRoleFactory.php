<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
					'person_id' => $this->faker->randomElement(Person::all()->pluck('id')->toArray()),
					'role_id' => $this->faker->randomElement(Role::all()->pluck('id')->toArray()),
        ];
    }
}
