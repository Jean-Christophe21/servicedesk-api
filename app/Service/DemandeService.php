<?php

namespace App\Service;

use App\DTO\DemandeDTO;
use App\DTO\DemandeModificationDTO;
use App\DTO\DemandeStatusDTO;
use App\DTO\DemandeTechnicianDTO;
use App\Repository\DemandeRepositoryInterface;

class DemandeService implements DemandeServiceInterface
{
    public function __construct(
        private readonly DemandeRepositoryInterface $demandeRepository
    ) {}

    public function getAllDemandes()
    {
        return $this->demandeRepository->getAllDemande();
    }

    public function createEmployeDemande(DemandeDTO $demande)
    {
        return $this->demandeRepository->createDemande($demande);
    }

    public function modifyEmployeDemande(int $demandeId, DemandeModificationDTO $demandeDTO)
    {
        return $this->demandeRepository->modifyDemande($demandeId, $demandeDTO);
    }

    public function modifyEmployeDemandeStatus(int $demandeId, DemandeStatusDTO $demandeStatus)
    {
        return $this->demandeRepository->modifyDemandeStatus($demandeId, $demandeStatus);
    }

    public function getEmployeDemandeById(int $idDemande)
    {
        return $this->demandeRepository->getDemandeByid($idDemande);
    }

    public function assignDemandeToTechnician(int $demandeId, DemandeTechnicianDTO $demandeTechnicianDTO)
    {
        return $this->demandeRepository->assignDemande($demandeId, $demandeTechnicianDTO);
    }
}
