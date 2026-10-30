<?php

namespace App\Repository;

use App\DTO\EmployeDTO;

interface EmployeRepositoryInterface
{
    public function getAllDemande(int $employe_id);
}
