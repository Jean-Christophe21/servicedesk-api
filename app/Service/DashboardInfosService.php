<?php

namespace App\Service;

use App\DTO\EmployeIdDTO;
use App\Repository\DashboardInfosRepository;
use App\Repository\DashboardInfosRepositoryInterface;

class DashboardInfosService implements DashboardInfosServiceInterface
{
    public function __construct(
        public DashboardInfosRepositoryInterface $dashboardInfosRepository
    )
    {

    }

    public function getDashboardInformations(EmployeIdDTO $employeIdDTO)
    {
        return $this->dashboardInfosRepository->getDashboardData($employeIdDTO);
    }
}
