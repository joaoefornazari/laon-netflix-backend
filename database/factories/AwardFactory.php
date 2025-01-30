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
					'Oscars - Best Picture',
					'Oscars - Best Director',
					'Oscars - Best Actor',
					'Oscars - Best Actress',
					'Oscars - Best Supporting Actor',
					'Oscars - Best Supporting Actress',
					'Oscars - Best Original Screenplay',
					'Oscars - Best Adapted Screenplay',
					'Oscars - Best Cinematography',
					'Oscars - Best Film Editing',
					'Oscars - Best Production Design',
					'Oscars - Best Costume Design',
					'Oscars - Best Makeup and Hairstyling',
					'Oscars - Best Visual Effects',
					'Oscars - Best Sound Mixing',
					'Oscars - Best Sound Editing',
					'Oscars - Best Original Score',
					'Oscars - Best Original Song',
					'Oscars - Best Animated Feature',
					'Oscars - Best Documentary Feature',
					'Oscars - Best International Feature Film',
					'Oscars - Best Short Film',
					'Oscars - Best Animated Short Film',
					'Oscars - Best Documentary Short Subject',
					'Emmys - Best TV Series',
					'Emmys - Best Limited Series',
					'Emmys - Best TV Movie',
					'Emmys - Best Actor in a TV Series',
					'Emmys - Best Actress in a TV Series',
					'Emmys - Best Supporting Actor in a TV Series',
					'Emmys - Best Supporting Actress in a TV Series',
					'Emmys - Best Writing for a TV Series',
					'Emmys - Best Directing for a TV Series',
					'Emmys - Best Cinematography for a TV Series',
					'Emmys - Best Editing for a TV Series',
					'Emmys - Best Production Design for a TV Series',
					'Emmys - Best Costume Design for a TV Series',
					'Emmys - Best Makeup and Hairstyling for a TV Series',
					'Emmys - Best Visual Effects for a TV Series',
					'Emmys - Best Sound Mixing for a TV Series',
					'Emmys - Best Sound Editing for a TV Series',
					'Emmys - Best Original Score for a TV Series',
					'Emmys - Best Original Song for a TV Series'
				])
			];
    }
}
