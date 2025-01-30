<?php

namespace Database\Factories;

use App\Models\Award;
use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaAwardFactory extends Factory
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
					'award_id' => $this->faker->randomElement(Award::all()->pluck('id')->toArray()),
        ];
    }
}
