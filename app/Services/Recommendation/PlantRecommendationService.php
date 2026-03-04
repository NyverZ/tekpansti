<?php

namespace App\Services\Recommendation;

use App\Models\Plant;
use Illuminate\Database\Eloquent\Collection;
use InvalidArgumentException;

class PlantRecommendationService
{
    public function recommend(string $goal, int $limit = 10): Collection
    {
        $rule = config("recommendation.goals.{$goal}");

        if (!$rule || empty($rule['nutrients'])) {
            throw new InvalidArgumentException("Unknown goal: {$goal}");
        }

        $conditions = $rule['nutrients'];

        $query = Plant::query()
            ->where('is_published', true)
            ->with([
                'category',
                'nutrients' => fn($q) => $q->whereIn('slug', array_keys($conditions)),
            ]);

        foreach ($conditions as $slug => $minAmount) {
            $query->whereHas('nutrients', function ($q) use ($slug, $minAmount) {
                $q->where('slug', $slug)->wherePivot('amount', '>=', $minAmount);
            });
        }

        return $query->get()
            ->map(function (Plant $plant) use ($conditions) {
                $score = 0;
                foreach ($conditions as $slug => $minAmount) {
                    $n = $plant->nutrients->firstWhere('slug', $slug);
                    $amount = $n?->pivot?->amount ?? 0;
                    $score += $minAmount > 0 ? $amount / $minAmount : 0;
                }
                $plant->setAttribute('recommendation_score', round($score, 2));
                return $plant;
            })
            ->sortByDesc('recommendation_score')
            ->take($limit)
            ->values();
    }
}
