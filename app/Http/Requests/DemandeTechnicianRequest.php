<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemandeTechnicianRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'technician_id' => ['required', 'integer', 'exists:employes,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
