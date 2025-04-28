<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'user_id' => User::factory()->create()->id,
            'user_id' => User::factory()->state([
                'role' => 'student',
            ])->create()->id,
            'student_number' => $this->faker->unique()->numerify('##########'),
            'first_name' => $this->faker->firstName(),
            'middle_initial' => $this->faker->randomLetter(),
            'last_name' => $this->faker->lastName(),
            'suffix' => $this->faker->optional()->suffix(),
            'guardian_name' => $this->faker->name(),
            'relationship' => $this->faker->word(),
            //'cp_number' => $this->faker->phoneNumber(),
            'cp_number' => $this->faker->numerify('63##########'),
            'qr_code' => $this->faker->unique()->uuid(), // Unique QR code
        ];
    }
}
