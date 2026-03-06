@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div class="space-y-6">
                <span class="sf-chip">Food Safety Quiz</span>
                <h1 class="text-5xl font-bold text-slate-900">Test core food safety knowledge in three questions</h1>
                <p class="text-lg leading-8 text-slate-600">
                    The quiz is lightweight, competition-friendly, and designed to reinforce the most important hygiene and storage rules.
                </p>
                <div id="quiz-result-panel" class="sf-panel hidden p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Result</p>
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

                    <button type="button" id="quiz-submit" class="sf-button-primary">See My Score</button>
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
                feedback.textContent = 'Excellent. You have a strong grasp of the essential SafeFood rules.';
            } else if (score >= total - 1) {
                feedback.textContent = 'Good result. Review the missed point and keep strengthening your food safety habits.';
            } else {
                feedback.textContent = 'Needs improvement. Revisit the education and HACCP sections to reinforce the basics.';
            }

            panel.classList.remove('hidden');
        });
    </script>
@endsection
