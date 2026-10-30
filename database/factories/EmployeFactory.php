<?php

namespace Database\Factories;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeFactory extends Factory
{
    protected $model = Employe::class;

    public function definition(): array
    {
        return [
            'name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'role' => fake()->randomElement(['employe', 'technicien']),
        ];
    }

    public function technicien(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'technicien',
        ]);
    }

    public function utilisateur(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'employe',
        ]);
    }
}
