<?php

namespace App\Service;

use App\Repository\EmployeRepository;
use App\Repository\EmployeRepositoryInterface;
use App\Service\EmployeServiceInterface;

class EmployeService implements EmployeServiceInterface
{
    public function __construct(
        private readonly EmployeRepositoryInterface $employeRepository
    )
    { }

    public function getEmployeDemandes(int $id)
    {
        return $this->employeRepository->getAllDemande($id);
    }
}
