<?php

namespace App\Repository;

use App\DTO\DemandeDTO;
use App\DTO\DemandeModificationDTO;
use App\DTO\DemandeStatusDTO;
use App\DTO\DemandeTechnicianDTO;

interface DemandeRepositoryInterface
{
    public function getAllDemande();
    public function createDemande(DemandeDTO $demande);

    public function modifyDemande(int $demandeId, DemandeModificationDTO $demandeDTO);

    public function modifyDemandeStatus(int $demandeId, DemandeStatusDTO $demandeStatus);

    public function getDemandeByid(int $id);

    public function assignDemande(int $idDemande, DemandeTechnicianDTO $demandeTechnicianDTO);

}
