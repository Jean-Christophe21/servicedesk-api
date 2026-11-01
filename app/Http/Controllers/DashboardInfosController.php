<?php

namespace App\Http\Controllers;

use App\DTO\EmployeIdDTO;
use App\Http\Requests\EmployeIdRequest;
use App\Service\DashboardInfosServiceInterface;

readonly class DashboardInfosController
{
    public function __construct(
        private DashboardInfosServiceInterface $commentaireService
    )
    {
    }

    public function get(EmployeIdRequest $employeIdRequest)
    {
        $employeId = EmployeIdDTO::fromRequest($employeIdRequest);

        $infos = $this->commentaireService->getDashboardInformations($employeId);

        if (!$infos) {
            return response()->json(['message' => 'Comment not found'], 404);

        }
        return $infos;

    }

}
