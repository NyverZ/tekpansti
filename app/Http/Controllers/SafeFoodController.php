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
                    'label' => 'Kasus penyakit bawaan makanan setiap tahun di Amerika Serikat',
                    'description' => 'CDC memperkirakan jutaan orang masih jatuh sakit setiap tahun akibat makanan yang terkontaminasi.',
                ],
                [
                    'value' => '128K',
                    'label' => 'Rawat inap terkait penyakit bawaan makanan',
                    'description' => 'Keamanan pangan bukan hanya topik edukasi, tetapi juga isu kesehatan masyarakat dan pencegahan.',
                ],
                [
                    'value' => '5',
                    'label' => 'Kebiasaan utama yang cepat menurunkan risiko di dapur',
                    'description' => 'Kebersihan tangan, suhu aman, pemisahan bahan, sanitasi, dan penyimpanan memberi dampak terbesar.',
                ],
            ],
            'coreFeatures' => [
                [
                    'icon' => 'shield',
                    'title' => 'Edukasi HACCP',
                    'description' => 'Pelajari tujuh prinsip HACCP melalui contoh penerapan nyata dan poin pemeriksaan yang praktis.',
                    'href' => route('haccp'),
                    'cta' => 'Pelajari HACCP',
                    'accent' => 'teal',
                ],
                [
                    'icon' => 'check',
                    'title' => 'Cek Keamanan Makanan',
                    'description' => 'Lakukan pemeriksaan mandiri terpandu dan dapatkan skor keamanan beserta rekomendasi yang sesuai.',
                    'href' => route('safety-checker'),
                    'cta' => 'Mulai Pemeriksaan',
                    'accent' => 'amber',
                ],
                [
                    'icon' => 'chart',
                    'title' => 'Perbandingan Nutrisi',
                    'description' => 'Bandingkan makanan secara visual dengan Chart.js untuk membantu memilih menu yang lebih sehat dan aman.',
                    'href' => route('foods.compare'),
                    'cta' => 'Bandingkan Makanan',
                    'accent' => 'sky',
                ],
                [
                    'icon' => 'spark',
                    'title' => 'Kuis Keamanan Pangan',
                    'description' => 'Uji pemahaman melalui kuis interaktif singkat yang cocok untuk pembelajaran dan demo kompetisi.',
                    'href' => route('quiz'),
                    'cta' => 'Mulai Kuis',
                    'accent' => 'rose',
                ],
                [
                    'icon' => 'article',
                    'title' => 'Artikel Edukasi',
                    'description' => 'Akses konten edukatif tentang kebersihan, pencegahan kontaminasi, dan pemahaman nutrisi.',
                    'href' => route('articles.index'),
                    'cta' => 'Baca Artikel',
                    'accent' => 'violet',
                ],
            ],
            'interactiveTools' => [
                [
                    'title' => 'Cek Keamanan Makanan',
                    'description' => 'Ubah kebiasaan kebersihan dan penyimpanan menjadi skor yang mudah dipahami.',
                    'href' => route('safety-checker'),
                    'badge' => 'Interaktif',
                ],
                [
                    'title' => 'Perbandingan Nutrisi',
                    'description' => 'Bandingkan ayam, tempe, buah, dan makanan pokok hanya dalam hitungan detik.',
                    'href' => route('foods.compare'),
                    'badge' => 'Chart.js',
                ],
                [
                    'title' => 'Kuis',
                    'description' => 'Jadikan proses belajar sebagai evaluasi yang menarik bagi pengguna dan dewan juri.',
                    'href' => route('quiz'),
                    'badge' => 'Cek Cepat',
                ],
            ],
            'journeySteps' => [
                [
                    'step' => '01',
                    'title' => 'Mulai dari pemahaman dasar',
                    'description' => 'Pelajari prinsip keamanan pangan, higienitas, dan HACCP agar pengguna punya dasar yang kuat sebelum memakai alat interaktif.',
                    'href' => route('education'),
                    'cta' => 'Buka Edukasi',
                ],
                [
                    'step' => '02',
                    'title' => 'Cek kebiasaan Anda',
                    'description' => 'Gunakan pemeriksaan mandiri untuk melihat apakah praktik penyimpanan, sanitasi, dan penanganan makanan Anda sudah aman.',
                    'href' => route('safety-checker'),
                    'cta' => 'Mulai Cek',
                ],
                [
                    'step' => '03',
                    'title' => 'Bandingkan bahan pangan',
                    'description' => 'Lihat profil nutrisi bahan pangan secara visual agar pemilihan menu menjadi lebih tepat, mudah dipahami, dan menarik saat demo.',
                    'href' => route('foods.compare'),
                    'cta' => 'Bandingkan',
                ],
            ],
            'faqs' => [
                [
                    'question' => 'Apakah makanan yang terlihat bersih pasti aman dikonsumsi?',
                    'answer' => 'Tidak selalu. Makanan dapat mengandung mikroorganisme berbahaya meskipun warna, bau, dan tampilannya masih terlihat normal. Karena itu, keamanan pangan harus dijaga melalui kebersihan, suhu aman, dan penyimpanan yang benar.',
                ],
                [
                    'question' => 'Mengapa makanan sisa harus segera didinginkan?',
                    'answer' => 'Makanan sisa yang terlalu lama berada di suhu ruang memberi kesempatan bakteri berkembang lebih cepat. Pendinginan yang cepat membantu menekan pertumbuhan mikroorganisme dan menjaga mutu makanan.',
                ],
                [
                    'question' => 'Apa manfaat membandingkan nutrisi di SafeFood?',
                    'answer' => 'Fitur perbandingan membantu pengguna melihat perbedaan karbohidrat, protein, lemak, dan kalsium antar bahan pangan secara langsung. Ini membuat keputusan memilih bahan menjadi lebih mudah dan edukatif.',
                ],
            ],
            'platformStats' => [
                ['value' => max(50, $stats['articles']), 'suffix' => '+', 'label' => 'Materi Edukasi'],
                ['value' => 20, 'suffix' => '+', 'label' => 'Topik Keamanan Pangan'],
                ['value' => 500, 'suffix' => '+', 'label' => 'Target Pembelajar'],
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

    public function hygieneSanitation(): View
    {
        return view('pages.higiene-sanitasi', [
            'sections' => $this->safeFoodContentService->hygieneSanitationSections(),
            'dailyChecklist' => $this->safeFoodContentService->hygieneSanitationChecklist(),
        ]);
    }

    public function foodProcessingStorage(): View
    {
        return view('pages.pengolahan-penyimpanan-pangan', [
            'sections' => $this->safeFoodContentService->foodProcessingStorageSections(),
            'criticalPoints' => $this->safeFoodContentService->foodProcessingStorageCriticalPoints(),
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
