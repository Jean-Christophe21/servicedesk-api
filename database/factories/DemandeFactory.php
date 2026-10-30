<?php

namespace Database\Factories;

use App\Models\Demande;
use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Demande>
 */
class DemandeFactory extends Factory
{
    protected $model = Demande::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->text(450),
            'status' => fake()->randomElement(['ouvert', 'en_cours', 'ferme', 'resolu']),
            'technicien_id' => Employe::factory()->technicien(),
            'employe_id' => Employe::factory()->utilisateur(),
        ];
    }
}
