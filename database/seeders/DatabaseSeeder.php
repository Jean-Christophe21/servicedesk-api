<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use App\Models\Demande;
use App\Models\Employe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $techniciens = Employe::factory()
            ->technicien()
            ->count(4)
            ->create();

        $employes = Employe::factory()
            ->utilisateur()
            ->count(6)
            ->create();

        $demandes = Demande::factory()
            ->count(50)
            ->state(fn (array $attributes) => [
                'technicien_id' => $techniciens->random()->id,
                'employe_id' => $employes->random()->id,
            ])
            ->create();

        $demandes->each(function (Demande $demande) use ($employes): void {
            Commentaire::factory()
                ->count(6)
                ->state([
                    'demande_id' => $demande->id,
                    'employe_id' => $employes->random()->id,
                ])
                ->create();
        });
    }
}
