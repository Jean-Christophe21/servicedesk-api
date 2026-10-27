<?php

namespace App\DTO;

class CommentaireDTO
{
    public function __construct(
        public string $contenu,
        public int $employeId,
        public int $demandeId,
        public bool $modified,
    )
    { }

    public function toArray() : array
    {
        return [
            'contenu' => $this->contenu,
            'employeId' => $this->employeId,
            'demandeId' => $this->demandeId,
            'modified' => $this->modified,
        ];
    }

}
