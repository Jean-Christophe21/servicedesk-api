<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DemandeModificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:500'],
            //'status' => ['required', Rule::in(['ouvert', 'en_cours', 'resolu', 'ferme'])], ne doit être modifé que par la route 'demandes/{id}/status'
            //'technician_id' => ['sometimes', 'integer', 'exists:employes,id'], ce champ ne doit pas être modifié
            //'employe_id' => ['required', 'integer', 'exists:employes,id'],  incorrect. on ne doit pas modifier l'id de l'employé ayant émis une demande
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
