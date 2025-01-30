<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => $this->faker->randomElement(['Action', 'Adventure', 'Comedy', 'Drama', 'Fantasy', 'Horror', 'Mystery', 'Thriller', 'Romance', 'Sci-Fi', 'Western', 'Animation', 'Documentary', 'Biography', 'Crime', 'Family', 'History', 'Music', 'Sport', 'War']),
        ];
    }
}
