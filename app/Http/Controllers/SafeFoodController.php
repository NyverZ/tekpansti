<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Plant;
use App\Services\SafeFoodContentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SafeFoodController extends Controller
{
    public function __construct(
        private readonly SafeFoodContentService $safeFoodContentService
    ) {
    }

    public function home(): View
    {
        $stats = Cache::remember('safefood.home.stats', now()->addMinutes(10), function (): array {
            $articleCount = Article::query()->published()->count();

            return [
                'ingredients' => Plant::query()->published()->count(),
                'nutritionPoints' => DB::table('plant_nutrient')
                    ->join('plants', 'plants.id', '=', 'plant_nutrient.plant_id')
                    ->where('plants.is_published', true)
                    ->count(),
                'articles' => $articleCount,
                'tips' => count($this->safeFoodContentService->tips()),
            ];
        });

        $latestArticles = Cache::remember('safefood.home.latest-articles', now()->addMinutes(10), function () {
            return Article::query()
                ->published()
                ->latest()
                ->select(['id', 'slug', 'title', 'content', 'image', 'created_at'])
                ->take(3)
                ->get();
        });

        return view('pages.home', [
            'stats' => $stats,
            'latestArticles' => $latestArticles,
            'dailyTip' => $this->safeFoodContentService->dailyTip(),
            'educationModules' => $this->safeFoodContentService->educationModules(),
            'whyItMattersStats' => [
                [
                    'value' => '48M',
                    'label' => 'Foodborne illnesses every year in the U.S.',
                    'description' => 'CDC estimates millions of people still get sick from contaminated food annually.',
                ],
                [
                    'value' => '128K',
                    'label' => 'Hospitalizations linked to foodborne illness',
                    'description' => 'Food safety is not only educational. It is a public health and prevention issue.',
                ],
                [
                    'value' => '5',
                    'label' => 'Core habits reduce kitchen risk fast',
                    'description' => 'Clean hands, safe temperatures, separation, sanitation, and storage make the biggest difference.',
                ],
            ],
            'coreFeatures' => [
                [
                    'icon' => 'shield',
                    'title' => 'HACCP Education',
                    'description' => 'Learn the seven HACCP principles with real implementation examples and practical checkpoints.',
                    'href' => route('haccp'),
                    'cta' => 'Explore HACCP',
                    'accent' => 'teal',
                ],
                [
                    'icon' => 'check',
                    'title' => 'Food Safety Checker',
                    'description' => 'Run a guided self-check and get an instant safety score with personalized recommendations.',
                    'href' => route('safety-checker'),
                    'cta' => 'Run Checker',
                    'accent' => 'amber',
                ],
                [
                    'icon' => 'chart',
                    'title' => 'Nutrition Comparison',
                    'description' => 'Compare foods visually using Chart.js to support healthier and safer meal decisions.',
                    'href' => route('foods.compare'),
                    'cta' => 'Compare Foods',
                    'accent' => 'sky',
                ],
                [
                    'icon' => 'spark',
                    'title' => 'Food Safety Quiz',
                    'description' => 'Test understanding with a quick interactive quiz built for learners and competition demos.',
                    'href' => route('quiz'),
                    'cta' => 'Take Quiz',
                    'accent' => 'rose',
                ],
                [
                    'icon' => 'article',
                    'title' => 'Educational Articles',
                    'description' => 'Access modern educational content on hygiene, contamination prevention, and nutrition awareness.',
                    'href' => route('articles.index'),
                    'cta' => 'Read Articles',
                    'accent' => 'violet',
                ],
            ],
            'interactiveTools' => [
                [
                    'title' => 'Food Safety Checker',
                    'description' => 'Translate hygiene and storage habits into an actionable score.',
                    'href' => route('safety-checker'),
                    'badge' => 'Interactive',
                ],
                [
                    'title' => 'Nutrition Comparison',
                    'description' => 'Compare chicken, tempeh, fruit, and staple foods in seconds.',
                    'href' => route('foods.compare'),
                    'badge' => 'Chart.js',
                ],
                [
                    'title' => 'Quiz',
                    'description' => 'Turn learning into an engaging assessment for users and judges.',
                    'href' => route('quiz'),
                    'badge' => 'Fast Check',
                ],
            ],
            'platformStats' => [
                ['value' => max(50, $stats['articles']), 'suffix' => '+', 'label' => 'Educational Touchpoints'],
                ['value' => 20, 'suffix' => '+', 'label' => 'Food Safety Topics'],
                ['value' => 500, 'suffix' => '+', 'label' => 'Target Learners'],
            ],
        ]);
    }

    public function education(): View
    {
        return view('pages.edukasi', [
            'educationModules' => $this->safeFoodContentService->educationModules(),
            'dailyTip' => $this->safeFoodContentService->dailyTip(),
            'featuredArticles' => Cache::remember('safefood.education.featured-articles', now()->addMinutes(10), function () {
                return Article::query()
                    ->published()
                    ->latest()
                    ->select(['id', 'slug', 'title', 'content', 'created_at'])
                    ->take(6)
                    ->get();
            }),
        ]);
    }

    public function haccp(): View
    {
        return view('pages.haccp', [
            'principles' => $this->safeFoodContentService->haccpPrinciples(),
            'examples' => $this->safeFoodContentService->haccpExamples(),
            'checklist' => $this->safeFoodContentService->haccpChecklist(),
        ]);
    }

    public function showSafetyChecker(): View
    {
        return view('pages.selfcheck', [
            'questions' => $this->safeFoodContentService->safetyCheckerQuestions(),
        ]);
    }

    public function submitSafetyChecker(Request $request): RedirectResponse
    {
        $questions = $this->safeFoodContentService->safetyCheckerQuestions();
        $fields = [];

        foreach ($questions as $question) {
            $fields[$question['key']] = ['required', 'boolean'];
        }

        $validated = $request->validate($fields);
        $result = $this->safeFoodContentService->evaluateSafetyChecker($validated);

        return redirect()
            ->route('safety-checker')
            ->withInput()
            ->with('checker_result', $result);
    }

    public function quiz(): View
    {
        return view('pages.quiz', [
            'questions' => $this->safeFoodContentService->quizQuestions(),
        ]);
    }

    public function consultation(): View
    {
        return view('pages.konsultasi', [
            'contacts' => $this->safeFoodContentService->consultationContacts(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'milestones' => $this->safeFoodContentService->milestones(),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'contacts' => $this->safeFoodContentService->consultationContacts(),
        ]);
    }
}
