<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rates>
 */
class RatesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rates=[
            'Very Satisfied',
            'Satisfied',
            'OK',
            'Disatisfied',
            'Very Disatisfied',
        ];
        return [
            //
            'rates'=>$this->faker->randomElement($rates),
        ];
    }
}
