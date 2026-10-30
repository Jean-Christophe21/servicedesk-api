<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' =>['required', 'max:50'],
            'first_name' =>['required', 'max:50'],
            'role' => ['required', Rule::in("comptable", "technicien", "developer")],
            'employe_id' => ['required'],
            'technician_id' => ['nullable']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
