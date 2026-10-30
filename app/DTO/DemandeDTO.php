<?php

namespace App\DTO;

use App\Http\Requests\DemandeModificationRequest;
use App\Http\Requests\DemandeRequest;

class DemandeDTO
{
    public function __construct(
        public string $titre,
        public $description,
        public string $statut,
        public ?int $technicienId,
        public int $employeId,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->titre,
            'description' => $this->description,
            'status' => $this->statut,
            'technicien_id' => $this->technicienId,
            'employe_id' => $this->employeId,
        ];
    }

    public static function fromRequest(DemandeRequest $demandeRequest): self
    {
        return new self(
            titre: $demandeRequest->validated('title'),
            description: $demandeRequest->validated('description'),
            statut: $demandeRequest->validated('status'),
            technicienId: $demandeRequest->validated('technician_id'),
            employeId: $demandeRequest->validated('employe_id'),
        );
    }
}
