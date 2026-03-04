<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PlantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if (!$this->filled('slug') && $this->filled('local_name')) {
            $this->merge(['slug' => Str::slug($this->local_name)]);
        }
    }

    public function rules(): array
    {
        $plantId = $this->route('plant')?->id;

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'local_name' => ['required', 'string', 'max:150'],
            'scientific_name' => ['required', 'string', 'max:180', Rule::unique('plants', 'scientific_name')->ignore($plantId)],
            'slug' => ['required', 'string', 'max:200', Rule::unique('plants', 'slug')->ignore($plantId)],
            'description' => ['nullable', 'string'],
            'health_benefits' => ['nullable', 'string'],
            'processing_potential' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'nutrients' => ['nullable', 'array'],
            'nutrients.*.id' => ['required', 'integer', 'exists:nutrients,id'],
            'nutrients.*.amount' => ['required', 'numeric', 'min:0'],
            'nutrients.*.notes' => ['nullable', 'string', 'max:255'],

            'regions' => ['nullable', 'array'],
            'regions.*.id' => ['required', 'integer', 'exists:regions,id'],
            'regions.*.abundance_level' => ['required', Rule::in(['low', 'medium', 'high'])],
            'regions.*.notes' => ['nullable', 'string', 'max:255'],
        ];
    }
}
