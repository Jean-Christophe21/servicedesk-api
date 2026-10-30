<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentaireRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required', 'string', 'max:500'],
            'employe_id' => ['required', 'integer', 'exists:employes,id'],
            'modified' => ['sometimes', 'boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
