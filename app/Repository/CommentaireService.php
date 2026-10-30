<?php

namespace App\Repository;

use App\DTO\CommentaireDTO;
use App\DTO\CommentaireModificationDTO;
use App\Models\Commentaire;
use App\Models\Demande;
use Illuminate\Support\Collection;

class CommentaireService implements CommentaireServiceInterface
{
    public function getDemandeCommentaires(int $demande_id): Collection
    {
        $query = Commentaire::query();
        // préparation de la requête
        $query->where('demande_id', $demande_id);

        return $query->get();
    }

    public function addCommentaireToDemande(int $demande_id, CommentaireDTO $commentaire): ?Commentaire
    {
        if (! Demande::whereKey($demande_id)->exists()) {
            return null;
        }

        return Commentaire::create([
            'content' => $commentaire->contenu,
            'employe_id' => $commentaire->employeId,
            'demande_id' => $demande_id,
            'modified' => $commentaire->modified,
        ]);
    }

    public function getCommentaireOfDemandeById(int $commentaire_id): Commentaire
    {
        return Commentaire::find($commentaire_id);
    }

    public function modifyCommentaire(int $id, CommentaireModificationDTO $commentaireModificationDTO)
    {
        $commentaire = Commentaire::find($id);
        if ($commentaire) {
            $commentaireModificationDTO->modified = true;
            $commentaire->update($commentaireModificationDTO->toArray());

            return $commentaire->fresh();
        }

        return null;
    }
}
