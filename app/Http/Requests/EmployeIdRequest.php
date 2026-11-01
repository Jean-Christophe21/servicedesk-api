<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeIdRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employe_id' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
