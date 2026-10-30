<?php

namespace App\DTO;

use App\Http\Requests\CommentaireRequest;

class CommentaireDTO
{
    public function __construct(
        public string $contenu,
        public int $employeId,
        //public int $demandeId,
        public bool $modified,
    ) {}

    public function toArray(): array
    {
        return [
            'content' => $this->contenu,
            'employe_id' => $this->employeId,
            //'demande_id' => $this->demandeId,
            'modified' => $this->modified,
        ];
    }

    public static function fromRequest(CommentaireRequest $commentaireRequest): self
    {
        return new self(
            contenu: $commentaireRequest->validated('content'),
            employeId: $commentaireRequest->validated('employe_id'),
            //demandeId: $commentaireRequest->validated('demandeId'),
            modified: (bool) ($commentaireRequest->validated('modified') ?? false),
        );
    }
}
