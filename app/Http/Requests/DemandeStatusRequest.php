<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DemandeStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => ['required', Rule::in(["ouvert", "en_cours", "resolu", "ferme"])]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
