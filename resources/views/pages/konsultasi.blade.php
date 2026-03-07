@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.92fr_1.08fr]">
            <div class="space-y-6">
                <span class="sf-chip">Konsultasi</span>
                <h1 class="text-5xl font-bold text-slate-900">Hubungkan pembelajaran dengan dukungan keamanan pangan yang nyata</h1>
                <p class="text-lg leading-8 text-slate-600">
                    Konsultasi SafeFood memberi pengguna langkah lanjutan setelah membaca artikel, menyelesaikan pemeriksaan keamanan, atau meninjau panduan HACCP.
                </p>
                <div class="sf-panel bg-[linear-gradient(140deg,#102033,#0f766e)] p-8 text-white">
                    <p class="text-sm uppercase tracking-[0.24em] text-teal-100">Penggunaan yang disarankan</p>
                    <p class="mt-4 text-xl leading-8 text-slate-100">Ajak pengguna bertanya tentang kegagalan penyimpanan, celah sanitasi, penanganan bahan pangan, atau pengganti makanan yang lebih sehat.</p>
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Email</p>
                    <p class="mt-4 text-2xl font-bold text-slate-900">{{ $contacts['email'] }}</p>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Gunakan untuk pertanyaan terstruktur, permintaan kolaborasi, atau dokumentasi lanjutan.</p>
                </div>
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">WhatsApp</p>
                    <p class="mt-4 text-2xl font-bold text-slate-900">{{ $contacts['whatsapp'] }}</p>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Paling sesuai untuk konsultasi cepat dan diskusi praktis seputar isu keamanan pangan.</p>
                </div>
                <div class="sf-panel p-8 md:col-span-2">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Instagram</p>
                    <p class="mt-4 text-2xl font-bold text-slate-900">{{ $contacts['instagram'] }}</p>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Gunakan kanal sosial untuk pembaruan edukasi yang lebih luas dan interaksi publik.</p>
                    <a href="https://wa.me/6281234567890" target="_blank" rel="noreferrer" class="sf-button-primary mt-8">Mulai Konsultasi WhatsApp</a>
                </div>
            </div>
        </div>
    </section>
@endsection
