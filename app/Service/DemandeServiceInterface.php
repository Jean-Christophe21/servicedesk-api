<?php

namespace App\Service;

use App\DTO\DemandeDTO;
use App\DTO\DemandeModificationDTO;
use App\DTO\DemandeStatusDTO;
use App\DTO\DemandeTechnicianDTO;
use App\Http\Requests\DemandeModificationRequest;

interface DemandeServiceInterface
{
    public function getAllDemandes();

    public function createEmployeDemande(DemandeDTO $demande);

    public function modifyEmployeDemande(int $demandeId, DemandeModificationDTO $demandeDTO);

    public function modifyEmployeDemandeStatus(int $demandeId, DemandeStatusDTO $demandeStatus);

    public function getEmployeDemandeById(int $idDemande);

    public function assignDemandeToTechnician(int $demandeId, DemandeTechnicianDTO $demandeTechnicianDTO);
}
