<?php

namespace App\Http\Controllers;

use App\DTO\DemandeDTO;
use App\DTO\DemandeModificationDTO;
use App\DTO\DemandeStatusDTO;
use App\DTO\DemandeTechnicianDTO;
use App\Http\Requests\DemandeModificationRequest;
use App\Http\Requests\DemandeRequest;
use App\Http\Requests\DemandeStatusRequest;
use App\Http\Requests\DemandeTechnicianRequest;
use App\Service\DemandeServiceInterface;

class DemandeController extends Controller
{
    public function __construct(
        private readonly DemandeServiceInterface $demandeService
    ) {}

    public function index()
    {
        return response()->json([
            'message' => 'Demandes retrieved successfully',
            'data' => $this->demandeService->getAllDemandes(),
        ]);
    }

    public function create(DemandeRequest $demandeRequest)
    {
        $demandeDTO = DemandeDTO::fromRequest($demandeRequest);
        $demande = $this->demandeService->createEmployeDemande($demandeDTO);

        return response()->json([
            'Message' => 'Demande created successfully',
            'data' => $demande], 201);
    }

    public function update(int $id, DemandeModificationRequest $demandeRequest)
    {
        $demandeDTO = DemandeModificationDTO::fromRequest($demandeRequest);
        $demande = $this->demandeService->modifyEmployeDemande($id, $demandeDTO);
        if (! $demande) {
            return response()->json(['message' => 'Demande not found'], 404);
        }

        return response()->json([
            'Message' => 'Demande updated successfully',
            'data' => $demande], 200);
    }

    public function updateStatus(int $id, DemandeStatusRequest $demandeStatusRequest)
    {
        $demandeStatusDTO = DemandeStatusDTO::fromRequest($demandeStatusRequest);
        $demande = $this->demandeService->modifyEmployeDemandeStatus($id, $demandeStatusDTO);
        if (! $demande) {
            return response()->json(['message' => 'Demande not found'], 404);
        }

        return response()->json([
            'Message' => 'Demande status updated successfully',
            'data' => $demande], 200);
    }

    public function show(int $id)
    {
        $demande = $this->demandeService->getEmployeDemandeById($id);
        if ($demande) {
            return response()->json([
                'Message' => 'Demande retrieved successfully',
                'data' => $demande], 200);
        }

        return response()->json([
            'Message' => 'Demande not found',
            'data' => null], 404);
    }

    // demande/id/assign
    public function assign(int $demandeId, DemandeTechnicianRequest $demandeTechnicianRequest)
    {
        $demandeTechnician = DemandeTechnicianDTO::fromRequest($demandeTechnicianRequest);
        $demande = $this->demandeService->assignDemandeToTechnician($demandeId, $demandeTechnician);
        if (! $demande) {
            return response()->json(['message' => 'Demande or technician not found'], 404);
        }

        return response()->json([
            'Message' => 'Demande assigned successfully',
            'data' => $demande], 200);
    }
}
