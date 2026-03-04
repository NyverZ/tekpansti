<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RecommendationRequest;
use App\Http\Resources\PlantResource;
use App\Services\Recommendation\PlantRecommendationService;
use Illuminate\Routing\Controller;

class RecommendationController extends Controller
{
    public function store(RecommendationRequest $request, PlantRecommendationService $service)
    {
        $plants = $service->recommend(
            $request->string('goal')->toString(),
            $request->integer('limit', 10)
        );

        return PlantResource::collection($plants)->additional([
            'meta' => [
                'goal' => $request->goal,
            ],
        ]);
    }
}
