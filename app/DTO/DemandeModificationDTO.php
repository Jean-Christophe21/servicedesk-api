<?php

namespace App\DTO;

use App\Http\Requests\DemandeModificationRequest;
use App\Http\Requests\DemandeRequest;

class DemandeModificationDTO
{
    public function __construct(
        public string $titre,
        public $description,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->titre,
            'description' => $this->description,
        ];
    }

    public static function fromRequest(DemandeModificationRequest $demandeRequest): self
    {
        return new self(
            titre: $demandeRequest->validated('title'),
            description: $demandeRequest->validated('description'),
        );
    }
}
