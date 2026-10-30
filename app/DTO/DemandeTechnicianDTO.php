<?php

namespace App\DTO;

use App\Http\Requests\DemandeTechnicianRequest;

class DemandeTechnicianDTO
{
    public function __construct(
        public int $technicianId
    ) {}

    public function toArray(): array
    {
        return [
            'technicianId' => $this->technicianId,
        ];
    }

    public static function fromRequest(DemandeTechnicianRequest $demandeRequest): self
    {
        return new self(
            technicianId: $demandeRequest->validated('technician_id'),
        );
    }
}
