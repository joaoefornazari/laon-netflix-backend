<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AwardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
			return [
				'name' => $this->faker->randomElement([
					'Oscar - Best Picture',
					'Oscar - Best Director',
					'Oscar - Best Actor',
					'Oscar - Best Actress',
					'Golden Globe - Best Picture',
					'Golden Globe - Best Director',
					'Golden Globe - Best Actor',
					'Golden Globe - Best Actress',
					'BAFTA - Best Picture',
					'BAFTA - Best Director',
					'BAFTA - Best Actor',
					'BAFTA - Best Actress'
				])
			];
    }
}
