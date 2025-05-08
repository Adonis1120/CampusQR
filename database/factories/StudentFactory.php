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
        $first_name = $this->faker->firstName();
        $middle_initial = strtoupper($this->faker->randomLetter());
        $last_name = $this->faker->lastName();
        $suffix = $this->faker->optional()->suffix();
        $full_name = $first_name . ' ' . $middle_initial . '. ' . $last_name . ($suffix ? ' ' . $suffix : '');

        return [
            'user_id' => User::factory()->state([
                'role' => 'student',
                'name' => $full_name,
            ])->create()->id,
            'student_number' => $this->faker->unique()->numerify('#########'),
            'first_name' => $first_name,
            'middle_initial' => $middle_initial,
            'last_name' => $last_name,
            'suffix' => $suffix,
            'guardian_name' => $this->faker->name(),
            'relationship' => $this->faker->word(),
            'cp_number' => $this->faker->numerify('+63##########'),
            'qr_code' => $this->faker->unique()->uuid(),
        ];
    }
}
