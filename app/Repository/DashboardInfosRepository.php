<?php

namespace App\Repository;

use App\DTO\EmployeIdDTO;
use App\Http\Requests\EmployeIdRequest;
use App\Models\Demande;

class DashboardInfosRepository implements DashboardInfosRepositoryInterface
{
    public function getDashboardData(EmployeIdDTO $employeIdDTO)
    {
        $total_demandes = Demande::where('employe_id', $employeIdDTO->employeId)
            ->count();
        $total_pending_demandes = Demande::where('status', 'en_cours')
            ->where('employe_id', $employeIdDTO->employeId)
            ->count();
        $total_open_demandes = Demande::where('status', 'ouvert')
            ->where('employe_id', $employeIdDTO->employeId)
            ->count();
        $total_resolved_demandes = Demande::where('status', 'resolu')
            ->where('employe_id', $employeIdDTO->employeId)
            ->count();
        $total_closed_demandes = Demande::where('status', 'ferme')
            ->where('employe_id', $employeIdDTO->employeId)
            ->count();

        return
            [
                "data" => [
                    'total_' => $total_demandes,
                    'total_open' => $total_open_demandes,
                    'total_closed' => $total_closed_demandes,
                    'total_resolved' => $total_resolved_demandes
                ]
            ];
    }
}
