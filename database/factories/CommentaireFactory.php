<?php

namespace Database\Factories;

use App\Models\Commentaire;
use App\Models\Demande;
use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Commentaire>
 */
class CommentaireFactory extends Factory
{
    protected $model = Commentaire::class;

    public function definition(): array
    {
        return [
            'content' => fake()->sentence(),
            'employe_id' => Employe::factory(),
            'demande_id' => Demande::factory(),
            'modified' => false,
        ];
    }

    public function modified(): static
    {
        return $this->state(fn (array $attributes) => [
            'modified' => true,
        ]);
    }
}
