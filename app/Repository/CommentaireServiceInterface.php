<?php

namespace App\Repository;

use App\DTO\CommentaireDTO;
use App\DTO\CommentaireModificationDTO;

interface CommentaireServiceInterface
{
    public function getDemandeCommentaires(int $demande_id);

    public function addCommentaireToDemande(int $demande_id, CommentaireDTO $commentaire);

    public function getCommentaireOfDemandeById(int $commentaire_id);

    public function modifyCommentaire(int $id, CommentaireModificationDTO $commentaireModificationDTO);
}
