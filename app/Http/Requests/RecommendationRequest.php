<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RecommendationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'goal' => ['required', 'string', Rule::in(array_keys(config('recommendation.goals', [])))],
            'limit' => ['nullable', 'integer', 'min:1', 'max:50'],
        ];
    }
}
