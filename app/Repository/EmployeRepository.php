<?php

namespace App\Repository;

use App\Models\Demande;
use App\Repository\EmployeRepositoryInterface;

class EmployeRepository implements EmployeRepositoryInterface
{

    public function getAllDemande(int $employe_id)
    {
        $query = Demande::query();
        $query->where('demandes.employe_id', $employe_id);
        return $query->get();
    }
}
