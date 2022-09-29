<?php

namespace Database\Factories;
use App\Services\Barangays;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaints>
 */
class ComplaintsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status=[
            'Pending',
            'Transfered',
            'Solved',
        ];
        $issue=[
            'Making Trouble',
            'Noisy Neigbors',
            'Animal Issue',
            'Waste Problem',
        ];
        return [
            //
            'name'=>$this->faker->name(),
            'address'=>$this->faker->randomElement(Barangays::barangay()),
            'complainant_address'=>$this->faker->randomElement(Barangays::barangay()),
            'age'=>$this->faker->numberBetween($min=20, $max=50),
            'email'=>$this->faker->email(),
            'value'=>$this->faker->paragraphs($nb = 3, $asText = true),
            'status'=>$this->faker->randomElement($status),
            'issue'=>$this->faker->randomElement($issue),
        ];
    }
}
