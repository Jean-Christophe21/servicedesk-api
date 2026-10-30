<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DemandeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:500'],
            'status' => ['required', Rule::in(['ouvert', 'en_cours', 'resolu', 'ferme'])],
            'technician_id' => ['sometimes', 'integer', 'exists:employes,id'],
            'employe_id' => ['required', 'integer', 'exists:employes,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
