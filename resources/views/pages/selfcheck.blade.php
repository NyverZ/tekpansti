@extends('layouts.app')

@section('content')
    @php
        $result = session('checker_result');
    @endphp

    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="space-y-6">
                <span class="sf-chip">Food Safety Checker</span>
                <h1 class="text-5xl font-bold text-slate-900">Run a quick self-check on your food handling habits</h1>
                <p class="text-lg leading-8 text-slate-600">
                    This interactive check replaces the old embedded form with a native SafeFood workflow that scores safety practices and generates recommendations.
                </p>

                @if ($result)
                    <div class="sf-panel bg-[linear-gradient(140deg,#102033,#0f766e)] p-8 text-white">
                        <p class="text-sm uppercase tracking-[0.24em] text-teal-100">Result</p>
                        <h2 class="mt-3 text-4xl font-bold">{{ $result['score'] }}/100</h2>
                        <p class="mt-2 text-lg text-slate-100">{{ $result['status'] }}</p>

                        @if (! empty($result['recommendations']))
                            <div class="mt-6 space-y-3">
                                @foreach ($result['recommendations'] as $recommendation)
                                    <p class="rounded-2xl bg-white/10 px-4 py-3 text-sm leading-7 text-slate-100">{{ $recommendation }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <div class="sf-panel p-8">
                <form method="POST" action="{{ route('safety-checker.submit') }}" class="space-y-6">
                    @csrf
                    @foreach ($questions as $question)
                        <fieldset class="rounded-[1.75rem] bg-slate-50 p-5">
                            <legend class="text-base font-semibold text-slate-900">{{ $question['question'] }}</legend>
                            <div class="mt-4 flex flex-wrap gap-3">
                                <label class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm text-slate-700">
                                    <input type="radio" name="{{ $question['key'] }}" value="1" @checked(old($question['key']) === '1')>
                                    Yes
                                </label>
                                <label class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm text-slate-700">
                                    <input type="radio" name="{{ $question['key'] }}" value="0" @checked(old($question['key']) === '0')>
                                    No
                                </label>
                            </div>
                            @error($question['key'])
                                <p class="mt-3 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </fieldset>
                    @endforeach

                    <button class="sf-button-primary">Calculate Safety Score</button>
                </form>
            </div>
        </div>
    </section>
@endsection
