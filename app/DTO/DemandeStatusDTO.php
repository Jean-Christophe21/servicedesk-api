<?php

namespace App\DTO;

use App\Http\Requests\DemandeStatusRequest;

class DemandeStatusDTO
{
    public function __construct(
        public string $statut,
    ) {}

    public function toArray(): array
    {
        return [
            'status' => $this->statut,
        ];
    }

    public static function fromRequest(DemandeStatusRequest $demandeRequest): self
    {
        return new self(
            statut: $demandeRequest->validated('status'),
        );
    }
}
