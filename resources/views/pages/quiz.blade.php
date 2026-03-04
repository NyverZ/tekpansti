@extends('layouts.app')

@section('content')

<script>
function checkQuiz(){

let score = 0

const q1 = document.querySelector('input[name="q1"]:checked')
const q2 = document.querySelector('input[name="q2"]:checked')
const q3 = document.querySelector('input[name="q3"]:checked')

if(q1) score += parseInt(q1.value)
if(q2) score += parseInt(q2.value)
if(q3) score += parseInt(q3.value)

let result = document.getElementById("quizResult")

if(score === 3){
result.innerHTML = "🎉 Skor Anda 3/3 - Pengetahuan keamanan pangan Anda sangat baik!"
}
else if(score === 2){
result.innerHTML = "👍 Skor Anda 2/3 - Cukup baik, tetapi masih bisa ditingkatkan."
}
else{
result.innerHTML = "⚠️ Skor Anda rendah. Pelajari kembali prinsip keamanan pangan."
}

}
</script>


<!-- QUIZ -->
<section class="py-16 bg-white dark:bg-gray-900">

<div class="container mx-auto px-6 max-w-3xl">

<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">

<h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
Kuis Pengetahuan Keamanan Pangan
</h2>

<p class="text-gray-500 dark:text-gray-400 mb-8">
Jawab pertanyaan berikut untuk mengetahui tingkat pemahaman Anda.
</p>


<form class="space-y-8">

<!-- Q1 -->
<div>

<p class="font-semibold mb-3">
1. Apa langkah pertama sebelum mengolah makanan?
</p>

<label class="block mb-2">
<input type="radio" name="q1" value="0"> Langsung memasak
</label>

<label class="block mb-2">
<input type="radio" name="q1" value="1"> Mencuci tangan
</label>

<label class="block">
<input type="radio" name="q1" value="0"> Menyiapkan piring
</label>

</div>


<!-- Q2 -->
<div>

<p class="font-semibold mb-3">
2. Makanan matang sebaiknya disimpan pada suhu?
</p>

<label class="block mb-2">
<input type="radio" name="q2" value="0"> Suhu kamar
</label>

<label class="block mb-2">
<input type="radio" name="q2" value="1"> Suhu kulkas
</label>

<label class="block">
<input type="radio" name="q2" value="0"> Suhu terbuka
</label>

</div>


<!-- Q3 -->
<div>

<p class="font-semibold mb-3">
3. Mengapa bahan mentah harus dipisahkan dari makanan matang?
</p>

<label class="block mb-2">
<input type="radio" name="q3" value="1"> Untuk mencegah kontaminasi
</label>

<label class="block mb-2">
<input type="radio" name="q3" value="0"> Agar terlihat rapi
</label>

<label class="block">
<input type="radio" name="q3" value="0"> Agar mudah dimasak
</label>

</div>


<button type="button"
onclick="checkQuiz()"
class="mt-4 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-semibold transition">

Lihat Hasil Kuis

</button>

</form>


<div id="quizResult"
class="mt-8 text-lg font-semibold text-emerald-600 dark:text-emerald-400">
</div>

</div>

</div>

</section>

@endsection
