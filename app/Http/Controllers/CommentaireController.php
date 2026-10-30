<?php

namespace App\Http\Controllers;

use App\DTO\CommentaireDTO;
use App\DTO\CommentaireModificationDTO;
use App\Http\Requests\CommentaireModificationRequest;
use App\Http\Requests\CommentaireRequest;
use App\Service\CommentaireServiceInterface;

class CommentaireController extends Controller
{
    public function __construct(
        private readonly CommentaireServiceInterface $commentaireService
    ) {}

    public function index() {}

    public function listDemandeComments(int $demandeId)
    {
        $comments = $this->commentaireService->getDemandeCommentaires($demandeId);

        return response()->json([
            'Message' => 'Comments retrieved successfully',
            'data' => $comments], 200);
    }

    public function createComment(int $demandeId, CommentaireRequest $commentaireRequest)
    {
        $commentaire = CommentaireDTO::fromRequest($commentaireRequest);
        $commentaire = $this->commentaireService->addCommentaireToDemande($demandeId, $commentaire);
        if (! $commentaire) {
            return response()->json(['message' => 'Demande not found'], 404);
        }

        return response()->json([
            'Message' => 'Comment created successfully',
            'data' => $commentaire], 200);
    }

    public function updateComment(int $demandeId, int $commentaireId, CommentaireModificationRequest $commentaireRequest)
    {
        $existingCommentaire = $this->commentaireService->getCommentaireOfDemandeById($commentaireId);
        if (! $existingCommentaire || $existingCommentaire->demande_id !== $demandeId) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $commentaire = CommentaireModificationDTO::fromRequest($commentaireRequest);
        $commentaire = $this->commentaireService->modifyCommentaire($commentaireId, $commentaire);
        if (! $commentaire) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        return response()->json([
            'Message' => 'Comment updated successfully',
            'data' => $commentaire], 200);
    }

    public function getComment(int $demandeId, int $commentaireId)
    {
        $commentaire = $this->commentaireService->getCommentaireOfDemandeById($commentaireId);
        if (! $commentaire || $commentaire->demande_id !== $demandeId) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        return response()->json([
            'Message' => 'Comment retrieved successfully',
            'data' => $commentaire], 200);
    }
}
