<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
					'title' => $this->faker->randomElement(['Ator', 'Atriz', 'Diretor', 'Diretora'])
        ];
    }
}
