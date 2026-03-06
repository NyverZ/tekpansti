<?php

namespace App\Services;

class SafeFoodContentService
{
    public function tips(): array
    {
        return [
            'Do not thaw frozen meat at room temperature.',
            'Separate raw proteins from ready-to-eat foods to avoid cross contamination.',
            'Store leftovers below 5 C and reheat them thoroughly before serving.',
            'Use clean cutting boards for fresh produce and different boards for raw meat.',
            'Wash hands with soap for at least 20 seconds before handling food.',
            'Check food labels and expiry dates before cooking or serving.',
        ];
    }

    public function dailyTip(): string
    {
        $tips = $this->tips();

        return $tips[array_rand($tips)];
    }

    public function educationModules(): array
    {
        return [
            [
                'title' => 'Food Safety Basics',
                'description' => 'Understand biological, chemical, and physical hazards in daily food preparation.',
                'items' => ['Safe temperatures', 'Cross contamination risks', 'Personal hygiene'],
            ],
            [
                'title' => 'Healthy Storage Practices',
                'description' => 'Learn how refrigeration, labeling, and stock rotation keep food safe and nutritious.',
                'items' => ['Cold chain awareness', 'FIFO storage', 'Safe thawing methods'],
            ],
            [
                'title' => 'Nutrition Literacy',
                'description' => 'Compare food ingredients by protein, fiber, calories, and supporting micronutrients.',
                'items' => ['Balanced plate guidance', 'Protein sources', 'Reading nutrition facts'],
            ],
        ];
    }

    public function safetyCheckerQuestions(): array
    {
        return [
            [
                'key' => 'wash_hands',
                'question' => 'Did you wash your hands with soap before cooking?',
                'recommendation' => 'Wash hands before touching ingredients, after handling raw food, and after touching surfaces.',
            ],
            [
                'key' => 'clean_utensils',
                'question' => 'Are your cooking utensils and cutting boards clean before use?',
                'recommendation' => 'Sanitize cutting boards, knives, and prep surfaces before and after use.',
            ],
            [
                'key' => 'separate_raw_food',
                'question' => 'Do you separate raw animal products from ready-to-eat food?',
                'recommendation' => 'Use separate containers or dedicated prep zones to prevent cross contamination.',
            ],
            [
                'key' => 'cold_storage',
                'question' => 'Do you store perishable food in the refrigerator promptly?',
                'recommendation' => 'Move perishable food to cold storage within two hours, or one hour in hot conditions.',
            ],
            [
                'key' => 'cook_thoroughly',
                'question' => 'Do you make sure food is cooked thoroughly before serving?',
                'recommendation' => 'Use a food thermometer for high-risk foods and verify safe internal temperatures.',
            ],
        ];
    }

    public function evaluateSafetyChecker(array $answers): array
    {
        $questions = collect($this->safetyCheckerQuestions());
        $positiveAnswers = collect($answers)->filter(fn ($answer) => (bool) $answer)->count();
        $score = (int) round(($positiveAnswers / max($questions->count(), 1)) * 100);

        $status = match (true) {
            $score >= 85 => 'Excellent',
            $score >= 65 => 'Good',
            $score >= 45 => 'Needs Improvement',
            default => 'High Risk',
        };

        $recommendations = $questions
            ->filter(fn (array $question) => empty($answers[$question['key']]))
            ->pluck('recommendation')
            ->values()
            ->all();

        return [
            'score' => $score,
            'status' => $status,
            'recommendations' => $recommendations,
        ];
    }

    public function haccpPrinciples(): array
    {
        return [
            'Conduct a hazard analysis to identify biological, chemical, and physical risks.',
            'Determine critical control points where risks can be prevented or reduced.',
            'Establish critical limits such as time, temperature, or pH targets.',
            'Create monitoring procedures for each critical control point.',
            'Define corrective actions when monitoring shows a deviation.',
            'Verify the HACCP system regularly using audits, testing, and review.',
            'Maintain clear records and documentation for traceability.',
        ];
    }

    public function haccpExamples(): array
    {
        return [
            [
                'title' => 'Chicken Rice Meal Service',
                'hazard' => 'Salmonella growth during undercooking or hot holding failure.',
                'ccp' => 'Cooking and hot holding stage.',
                'limit' => 'Core temperature reaches 75 C and hot holding remains above 60 C.',
            ],
            [
                'title' => 'Fresh Fruit Cup Preparation',
                'hazard' => 'Cross contamination from knives, hands, or unclean packaging.',
                'ccp' => 'Washing, cutting, and packaging area sanitation.',
                'limit' => 'Sanitized equipment, potable wash water, and chilled storage below 5 C.',
            ],
        ];
    }

    public function haccpChecklist(): array
    {
        return [
            'List all ingredients, suppliers, and storage requirements.',
            'Map every processing step from receiving to serving.',
            'Identify critical temperatures, allergens, and contamination risks.',
            'Prepare monitoring logs for cooking, cooling, and storage.',
            'Train staff on hygiene, sanitation, and corrective action procedures.',
            'Review records weekly and verify the process with internal audits.',
        ];
    }

    public function quizQuestions(): array
    {
        return [
            [
                'question' => 'What is the first step before handling food?',
                'options' => ['Prepare the plate', 'Wash hands with soap', 'Taste the ingredients'],
                'answer' => 1,
            ],
            [
                'question' => 'Why should raw chicken be stored separately?',
                'options' => ['To save shelf space', 'To keep it colder', 'To prevent cross contamination'],
                'answer' => 2,
            ],
            [
                'question' => 'Where should leftovers be stored after cooling slightly?',
                'options' => ['At room temperature', 'In the refrigerator', 'Near the stove'],
                'answer' => 1,
            ],
        ];
    }

    public function consultationContacts(): array
    {
        return [
            'email' => 'safefood@tekpansti.com',
            'whatsapp' => '+62 812-3456-7890',
            'instagram' => '@safefood.platform',
        ];
    }

    public function milestones(): array
    {
        return [
            [
                'title' => 'Cross-discipline Team',
                'description' => 'Built by food technology and information systems students to merge scientific accuracy with accessible UX.',
            ],
            [
                'title' => 'Competition-ready Focus',
                'description' => 'The platform is designed to communicate educational value, measurable impact, and technical stability.',
            ],
            [
                'title' => 'Scalable Learning Hub',
                'description' => 'SafeFood is structured to expand into richer diagnostics, case studies, and community engagement features.',
            ],
        ];
    }
}
