<?php

namespace App\DTO;

class DemandeDTO
{
    public function __construct(
        public string $titre,
        public $description,
        public string $statut,
    ){ }

    public function toArray(): array
    {
        return [
            'titre' => $this->titre,
            'description' => $this->description,
            'statut' => $this->statut,
        ];
    }
}
