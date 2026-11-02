<?php

namespace App\Repository;

use App\DTO\EmployeIdDTO;

interface DashboardInfosRepositoryInterface
{
    public function getDashboardData(EmployeIdDTO $employeIdDTO);
}
