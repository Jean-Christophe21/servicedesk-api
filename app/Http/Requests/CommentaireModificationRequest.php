<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentaireModificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required', 'max:500'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
