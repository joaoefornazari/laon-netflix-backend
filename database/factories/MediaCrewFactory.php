<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaCrewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
			return [
				'media_id' => $this->faker->randomElement(Media::all()->pluck('id')->toArray()),
				'person_id' => $this->faker->randomElement(Person::all()->pluck('id')->toArray()),
			];
    }
}
