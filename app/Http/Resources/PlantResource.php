<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlantResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'local_name' => $this->local_name,
            'scientific_name' => $this->scientific_name,
            'slug' => $this->slug,
            'description' => $this->description,
            'health_benefits' => $this->health_benefits,
            'processing_potential' => $this->processing_potential,
            'image_url' => $this->image_path ? asset('storage/' . $this->image_path) : null,
            'category' => $this->whenLoaded('category', fn() => [
                'id' => $this->category->id,
                'name' => $this->category->name,
                'slug' => $this->category->slug,
            ]),
            'nutrients' => $this->whenLoaded(
                'nutrients',
                fn() =>
                $this->nutrients->map(fn($n) => [
                    'id' => $n->id,
                    'name' => $n->name,
                    'slug' => $n->slug,
                    'unit' => $n->unit,
                    'amount' => (float) $n->pivot->amount,
                    'notes' => $n->pivot->notes,
                ])->values()
            ),
            'regions' => $this->whenLoaded(
                'regions',
                fn() =>
                $this->regions->map(fn($r) => [
                    'id' => $r->id,
                    'name' => $r->name,
                    'province' => $r->province,
                    'abundance_level' => $r->pivot->abundance_level,
                    'notes' => $r->pivot->notes,
                ])->values()
            ),
            'recommendation_score' => $this->when(isset($this->recommendation_score), $this->recommendation_score),
        ];
    }
}
