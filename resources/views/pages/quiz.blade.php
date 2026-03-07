@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div class="space-y-6">
                <span class="sf-chip">Quiz Keamanan Pangan</span>
                <h1 class="text-5xl font-bold text-slate-900">Uji pengetahuan dasar keamanan pangan dalam tiga pertanyaan</h1>
                <p class="text-lg leading-8 text-slate-600">
                    Quiz ini ringan, cocok untuk presentasi kompetisi, dan dirancang untuk memperkuat aturan higienitas serta penyimpanan yang paling penting.
                </p>
                <div id="quiz-result-panel" class="sf-panel hidden p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Hasil</p>
                    <h2 id="quiz-score" class="mt-3 text-4xl font-bold text-slate-900"></h2>
                    <p id="quiz-feedback" class="mt-4 text-sm leading-7 text-slate-600"></p>
                </div>
            </div>

            <div class="sf-panel p-8">
                <form id="safefood-quiz" class="space-y-6">
                    @foreach ($questions as $index => $question)
                        <fieldset class="rounded-[1.75rem] bg-slate-50 p-5">
                            <legend class="text-base font-semibold text-slate-900">{{ $index + 1 }}. {{ $question['question'] }}</legend>
                            <div class="mt-4 grid gap-3">
                                @foreach ($question['options'] as $optionIndex => $option)
                                    <label class="flex items-center gap-3 rounded-2xl bg-white px-4 py-3 text-sm text-slate-700">
                                        <input type="radio" name="question_{{ $index }}" value="{{ $optionIndex }}">
                                        <span>{{ $option }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>
                    @endforeach

                    <button type="button" id="quiz-submit" class="sf-button-primary">Lihat Skor Saya</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        const quizAnswers = @json(collect($questions)->pluck('answer'));
        const submitButton = document.getElementById('quiz-submit');

        submitButton.addEventListener('click', () => {
            let score = 0;

            quizAnswers.forEach((answer, index) => {
                const checked = document.querySelector(`input[name="question_${index}"]:checked`);

                if (checked && Number(checked.value) === Number(answer)) {
                    score += 1;
                }
            });

            const total = quizAnswers.length;
            const panel = document.getElementById('quiz-result-panel');
            const scoreLabel = document.getElementById('quiz-score');
            const feedback = document.getElementById('quiz-feedback');

            scoreLabel.textContent = `${score}/${total}`;

            if (score === total) {
                feedback.textContent = 'Sangat baik. Anda memahami aturan penting SafeFood dengan kuat.';
            } else if (score >= total - 1) {
                feedback.textContent = 'Hasil bagus. Tinjau poin yang terlewat dan terus perkuat kebiasaan keamanan pangan Anda.';
            } else {
                feedback.textContent = 'Masih perlu ditingkatkan. Kunjungi kembali bagian Edukasi dan HACCP untuk memperkuat dasar-dasarnya.';
            }

            panel.classList.remove('hidden');
        });
    </script>
@endsection
