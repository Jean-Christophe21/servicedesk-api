<?php

namespace App\Repository;

use App\DTO\DemandeDTO;
use App\DTO\DemandeModificationDTO;
use App\DTO\DemandeStatusDTO;
use App\DTO\DemandeTechnicianDTO;
use App\Models\Demande;
use App\Models\Employe;
use Illuminate\Support\Collection;

class DemandeRepository implements DemandeRepositoryInterface
{
    public function getAllDemande(): Collection
    {
        return Demande::all();
    }

    public function createDemande(DemandeDTO $demande): Demande
    {
        return Demande::create($demande->toArray());
    }

    public function modifyDemande(int $demandeId, DemandeModificationDTO $demandeDTO): ?Demande
    {
        $demande = Demande::find($demandeId);

        if ($demande) {
            $demande->update($demandeDTO->toArray());

            return $demande->fresh();
        }

        return null;
    }

    public function modifyDemandeStatus(int $demandeId, DemandeStatusDTO $demandeStatus): ?Demande
    {
        $demande = Demande::find($demandeId);
        if ($demande) {
            $demande->update($demandeStatus->toArray());

            return $demande->fresh();
        }

        return null;
    }

    public function getDemandeByid(int $id): ?Demande
    {
        return Demande::find($id);
    }

    public function assignDemande(int $idDemande, DemandeTechnicianDTO $demandeTechnicianDTO): ?Demande
    {
        $employe = Employe::find($demandeTechnicianDTO->technicianId);
        $demande = Demande::find($idDemande);
        if ($employe && $demande) {
            $demande->technicien_id = $demandeTechnicianDTO->technicianId;
            $demande->save();

            return $demande;
        }

        return null;
    }
}
