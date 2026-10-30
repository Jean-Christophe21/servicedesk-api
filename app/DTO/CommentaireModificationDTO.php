<?php

namespace App\DTO;

use App\Http\Requests\CommentaireModificationRequest;

class CommentaireModificationDTO
{
    public function __construct(
        public string $content,
    ) {}

    public function toArray(): array
    {
        return [
            'content' => $this->content,
        ];
    }

    public static function fromRequest(CommentaireModificationRequest $request): self
    {
        return new self(
            content: $request->validated('content'),
        );
    }
}
