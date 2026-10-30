<?php

namespace App\Service;

use App\DTO\CommentaireDTO;
use App\DTO\CommentaireModificationDTO;

interface CommentaireServiceInterface
{
    public function getDemandeCommentaires(int $demandeId);

    public function addCommentaireToDemande(int $demandeId, CommentaireDTO $commentaire);

    public function getCommentaireOfDemandeById(int $commentaireId);

    public function modifyCommentaire(int $id, CommentaireModificationDTO $commentaireModificationDTO);
}
