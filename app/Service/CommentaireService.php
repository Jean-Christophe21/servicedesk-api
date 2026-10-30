<?php

namespace App\Service;

use App\DTO\CommentaireDTO;
use App\DTO\CommentaireModificationDTO;
use App\Repository\CommentaireServiceInterface as CommentaireRepositoryInterface;

class CommentaireService implements CommentaireServiceInterface
{
    public function __construct(
        private readonly CommentaireRepositoryInterface $commentaireRepository
    ) {}

    public function getDemandeCommentaires(int $demandeId)
    {
        return $this->commentaireRepository->getDemandeCommentaires($demandeId);
    }

    public function addCommentaireToDemande(int $demandeId, CommentaireDTO $commentaire)
    {
        return $this->commentaireRepository->addCommentaireToDemande($demandeId, $commentaire);
    }

    public function getCommentaireOfDemandeById(int $commentaireId)
    {
        return $this->commentaireRepository->getCommentaireOfDemandeById($commentaireId);
    }

    public function modifyCommentaire(int $id, CommentaireModificationDTO $commentaireModificationDTO)
    {
        return $this->commentaireRepository->modifyCommentaire($id, $commentaireModificationDTO);
    }
}
