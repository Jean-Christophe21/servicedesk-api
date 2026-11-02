<?php

namespace App\Service;

use App\DTO\EmployeIdDTO;

interface DashboardInfosServiceInterface
{
    public function getDashboardInformations(EmployeIdDTO $employeIdDTO);
}
