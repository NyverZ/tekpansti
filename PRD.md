# Product Requirements Document

## 1. Ringkasan Produk

**Nama produk:** SafeFood  
**Jenis produk:** Platform edukasi keamanan pangan berbasis web  
**Target utama:** Masyarakat umum, pelajar, mahasiswa, dan pengguna yang ingin memahami keamanan pangan secara praktis  
**Tujuan utama:** Menyediakan pusat edukasi keamanan pangan yang mudah diakses, informatif, modern, dan siap dipresentasikan untuk kompetisi teknologi

SafeFood adalah website edukasi yang menggabungkan materi keamanan pangan, HACCP, literasi nutrisi, katalog bahan pangan, perbandingan nutrisi, kuis, artikel edukasi, serta self-check berbasis Google Form dalam satu pengalaman yang terintegrasi.

---

## 2. Latar Belakang Masalah

Masyarakat umum sering kesulitan memahami keamanan pangan karena informasi yang tersedia cenderung tersebar, teknis, atau tidak interaktif. Banyak pengguna memahami makanan hanya dari sisi rasa atau kebiasaan, tanpa memahami:

- risiko kontaminasi silang
- pentingnya suhu aman
- kebersihan tangan dan alat
- penyimpanan makanan yang benar
- pemilihan bahan pangan berdasarkan profil nutrisi

Menurut WHO, 1 dari 10 orang di dunia jatuh sakit setiap tahun akibat pangan yang tidak aman, sehingga edukasi perilaku penanganan pangan menjadi krusial. citeturn0search1

SafeFood hadir untuk menjembatani kebutuhan edukasi tersebut melalui pendekatan visual, interaktif, dan mudah dipahami.

---

## 3. Tujuan Produk

### 3.1 Tujuan Utama

- Meningkatkan literasi masyarakat tentang keamanan pangan.
- Menyediakan media belajar yang lebih menarik daripada artikel statis biasa.
- Menjadi platform demonstrasi yang kuat untuk kompetisi teknologi.
- Membantu pengguna memahami hubungan antara keamanan pangan, nutrisi, dan kebiasaan pengolahan makanan.

### 3.2 Tujuan Bisnis / Presentasi

- Menunjukkan kemampuan tim dalam membangun produk edukasi digital end-to-end.
- Menampilkan integrasi antara data, UI modern, fitur interaktif, dan sistem admin.
- Menjadi showcase proyek yang siap diuji oleh dosen, juri, dan masyarakat.

---

## 4. Non-Goals

Fitur berikut tidak menjadi fokus utama pada versi saat ini:

- diagnosis medis
- konsultasi medis real-time
- marketplace atau transaksi
- forum diskusi komunitas
- sistem e-learning kompleks berbasis progress per user
- rekomendasi diet klinis personal

---

## 5. Persona Pengguna

### 5.1 Pengguna Umum

Karakteristik:
- ingin belajar keamanan pangan dengan bahasa yang sederhana
- menggunakan ponsel atau laptop
- membutuhkan informasi praktis dan cepat dipahami

Kebutuhan:
- artikel edukasi
- self-check yang mudah diakses
- informasi bahan pangan dan nutrisi
- penjelasan dasar HACCP dan higienitas

### 5.2 Mahasiswa / Pelajar

Karakteristik:
- menggunakan platform untuk belajar, tugas, atau presentasi
- tertarik pada konten yang ringkas namun informatif

Kebutuhan:
- modul edukasi
- kuis
- perbandingan nutrisi
- referensi visual yang jelas

### 5.3 Admin

Karakteristik:
- mengelola konten website
- menambahkan artikel dan bahan pangan
- menjaga kualitas data

Kebutuhan:
- dashboard statistik
- CRUD artikel
- CRUD bahan pangan
- input komposisi gizi per 100 gram
- manajemen pengguna

---

## 6. Nilai Utama Produk

- **Edukasi:** materi disusun untuk dipahami masyarakat umum
- **Interaktif:** tidak hanya membaca, pengguna juga dapat mengecek, membandingkan, dan mengevaluasi
- **Visual:** ada chart nutrisi dan tata letak modern
- **Kredibel:** konten mengangkat HACCP, higiene, nutrisi, dan keamanan pangan
- **Berbasis standar global:** materi selaras dengan WHO Five Keys to Safer Food, Codex General Principles of Food Hygiene (CXC 1-1969, edisi 2023), dan ISO 22000:2018 sebagai rujukan HACCP/FSMS. citeturn0search1turn2search0turn0search2
- **Siap kompetisi:** desain dan struktur produk mendukung presentasi formal

---

## 7. Ruang Lingkup Fitur

### 7.1 Fitur Publik

#### A. Beranda

Fungsi:
- menampilkan identitas SafeFood
- menjelaskan manfaat platform
- menampilkan statistik platform
- menampilkan fitur utama
- menampilkan FAQ
- menampilkan artikel edukasi terbaru

Tujuan:
- memberi kesan pertama yang kuat
- memandu pengguna baru
- memperlihatkan nilai produk untuk juri

#### B. Halaman Edukasi

Fungsi:
- menampilkan landing page edukasi sebagai hub utama
- memberi pengantar keamanan pangan dalam hero section
- menampilkan 3 kartu materi inti yang dapat diklik (HACCP, Higiene dan Sanitasi, Pengolahan & Penyimpanan Pangan)
- setiap kartu berisi ikon, deskripsi singkat, dan CTA “Pelajari sekarang”

#### C. Halaman HACCP

Fungsi:
- menjelaskan prinsip HACCP
- memberi contoh penerapan
- memberi checklist implementasi

#### D. Self-Check Keamanan Makanan

Fungsi:
- mengarahkan pengguna ke Google Form untuk self-check
- memberi konteks penggunaan form
- menjaga aksesibilitas publik yang sederhana dan familiar

Catatan:
- dosen mengarahkan penggunaan Google Form karena website akan digunakan masyarakat umum
- website menampilkan embed Google Form dan tombol buka di tab baru

#### E. Halaman Quiz

Fungsi:
- menyajikan kuis singkat terkait keamanan pangan
- membantu pengguna menguji pemahaman dasar

#### F. Halaman Konsultasi

Fungsi:
- menampilkan kanal komunikasi yang tersedia
- memberi konteks kapan dan bagaimana kanal digunakan

#### G. Halaman Tentang Kami

Fungsi:
- menjelaskan visi, misi, dan milestone proyek
- memberi gambaran posisi SafeFood sebagai platform edukasi

#### H. Halaman Kontak

Fungsi:
- menampilkan email, WhatsApp, dan Instagram
- menjadi saluran untuk pertanyaan dan demo

#### I. Katalog Bahan Pangan

Fungsi:
- menampilkan daftar bahan pangan
- menyediakan pencarian dan filter kategori
- menampilkan deskripsi singkat, tips keamanan, dan jumlah indikator nutrisi

#### J. Detail Bahan Pangan

Fungsi:
- menampilkan deskripsi bahan pangan
- menampilkan manfaat dan catatan penanganan
- menampilkan grafik nutrisi
- menampilkan tabel profil nutrisi

#### K. Perbandingan Nutrisi

Fungsi:
- membandingkan dua bahan pangan
- menampilkan tabel perbandingan
- menampilkan chart visual

Data utama yang dibandingkan:
- karbohidrat
- protein
- lemak
- kalsium

#### L. Artikel Edukasi

Fungsi:
- menampilkan daftar artikel
- pencarian artikel
- detail artikel berbasis slug
- artikel terkait di halaman detail

#### M. Modul 5 Kunci Keamanan Pangan (WHO & BPOM) citeturn0search1turn2search3

Fungsi:
- menyajikan micro-lesson dan poster ringkas 5 kunci keamanan pangan
- menyediakan checklist praktik harian untuk rumah tangga dan kantin
- tombol unduh poster versi ringkas

Konten inti (ringkas): citeturn0search1turn2search3
- jaga kebersihan
- pisahkan pangan mentah dan matang
- masak sampai matang
- simpan pangan pada suhu aman
- gunakan air dan bahan baku yang aman

Catatan:
- Poster resmi WHO tersedia dalam 88 bahasa termasuk Bahasa Indonesia, sehingga mudah diadaptasi untuk konteks lokal. citeturn1search4
- BPOM juga mengadopsi 5 kunci keamanan pangan untuk edukasi publik di Indonesia. citeturn2search3

#### N. Suhu Aman dan "Danger Zone" citeturn0search0

Fungsi:
- menjelaskan zona bahaya 40-140 F (sekitar 4-60 C) sebagai rentang suhu pertumbuhan bakteri cepat citeturn0search0
- menekankan aturan 2 jam (1 jam jika suhu >90 F/sekitar 32 C) untuk makanan di suhu ruang citeturn0search0
- memberikan tips penyimpanan panas/dingin dan pendinginan sisa makanan

Rujukan:
- USDA FSIS sebagai acuan zona bahaya dan batas waktu penyimpanan suhu ruang. citeturn0search0

#### O. Edukasi Label Pangan (ING dan CEK KLIK - BPOM) citeturn2search6

Fungsi:
- panduan membaca Informasi Nilai Gizi (ING) pada kemasan pangan olahan
- edukasi "CEK KLIK" sebelum membeli pangan olahan
- contoh visual label dan checklist cepat

Rujukan:
- BPOM mengedukasi CEK KLIK dan pemahaman ING untuk konsumen. citeturn2search6

---

### 7.2 Fitur Autentikasi

Fungsi:
- registrasi
- login
- lupa password
- reset password
- verifikasi email
- logout
- social login dengan Google dan GitHub

Tujuan:
- memudahkan akses pengguna
- mendukung pengalaman login modern

---

### 7.3 Fitur Pengguna yang Sudah Login

#### A. Profil Pengguna

Fungsi:
- edit data profil
- ubah password
- hapus akun

#### B. Dashboard Pengguna

Fungsi:
- menampilkan statistik utama platform
- menampilkan artikel terbaru
- menampilkan tip harian
- tampilan dashboard futuristik dan terstruktur (control center)
- kartu statistik responsif dan konsisten light/dark mode
- sidebar dashboard dapat dibuka/tutup (drawer kiri di mobile, panel tetap di desktop)

---

### 7.4 Fitur Admin

Akses:
- hanya user dengan middleware `auth` dan `admin`

#### A. Dashboard Admin

Fungsi:
- melihat statistik bahan pangan, nutrisi, artikel, dan pengguna
- melihat artikel terbaru
- tampilan dashboard futuristik dan terstruktur, cocok untuk demo kompetisi
- panel aksi cepat untuk manajemen konten
- chart analitik dengan styling modern dan skeleton loading

#### B. Manajemen Artikel

Fungsi:
- daftar artikel
- pencarian artikel
- tambah artikel
- edit artikel
- hapus artikel
- pengaturan status publikasi

#### C. Manajemen Bahan Pangan

Fungsi:
- daftar bahan pangan
- tambah bahan pangan
- edit bahan pangan
- hapus bahan pangan
- upload gambar
- input kategori
- input deskripsi
- input manfaat
- input catatan penanganan
- input komposisi gizi per 100 gram

Komponen gizi yang saat ini dikelola:
- karbohidrat
- protein
- lemak
- kalsium

#### D. Manajemen Pengguna

Fungsi:
- melihat daftar user
- mencari user
- melihat role
- melihat tanggal pendaftaran
- menghapus user tertentu

---

## 8. Kebutuhan Data

### 8.1 Entitas Utama

- users
- articles
- plants
- categories
- nutrients
- plant_nutrient
- regions
- plant_region

### 8.2 Data Bahan Pangan

Setiap bahan pangan minimal memiliki:
- nama lokal
- nama ilmiah
- slug
- kategori
- deskripsi
- manfaat / konteks nutrisi
- catatan penanganan / pengolahan
- gambar opsional
- status publikasi

### 8.3 Data Nutrisi

Saat ini sistem berfokus pada empat komponen utama:
- carbohydrate
- protein
- fat
- calcium

Format:
- nilai per 100 gram
- tersimpan melalui relasi many-to-many `plant_nutrient`

### 8.4 Data Artikel

Setiap artikel minimal memiliki:
- title
- slug
- content
- image opsional
- is_published

### 8.5 Data Referensi & Standar

SafeFood menyimpan metadata sumber edukasi resmi untuk menjaga kredibilitas konten:
- nama sumber dan organisasi penerbit
- tahun/versi dan status pembaruan
- URL resmi dan bahasa
- ringkasan poin kunci

Sumber utama yang menjadi rujukan konten:
- WHO Five Keys to Safer Food (poster & pesan inti) citeturn0search1turn1search4
- Codex General Principles of Food Hygiene (CXC 1-1969, edisi 2023) citeturn2search0
- ISO 22000:2018 (FSMS, integrasi HACCP) citeturn0search2
- BPOM: 5 Kunci Keamanan Pangan & edukasi label (ING/CEK KLIK) citeturn2search3turn2search6
- USDA FSIS: zona bahaya & aturan waktu penyimpanan suhu ruang citeturn0search0

---

## 9. Kebutuhan Fungsional

### 9.1 Public Experience

- Pengunjung dapat mengakses seluruh konten publik tanpa login.
- Pengunjung dapat membuka artikel dan bahan pangan berbasis slug.
- Pengunjung dapat membandingkan dua bahan pangan.
- Pengunjung dapat membuka Google Form self-check dari halaman SafeFood.
- Pengunjung dapat mencari artikel.
- Pengunjung dapat memfilter bahan pangan berdasarkan kategori.

### 9.2 Auth Experience

- Pengguna dapat login dengan email/password.
- Pengguna dapat login dengan Google dan GitHub.
- Pengguna dapat melakukan reset password.

### 9.3 Admin Experience

- Admin dapat mengelola artikel.
- Admin dapat mengelola bahan pangan dan komposisi gizi.
- Admin dapat melihat dan menghapus user tertentu.

---

## 10. Kebutuhan Non-Fungsional

### 10.1 Teknologi

- Laravel 12
- Blade Templates
- TailwindCSS
- Chart.js
- Relational database
- Vite untuk asset bundling

### 10.2 UI/UX

- mobile-friendly
- modern
- profesional
- konsisten light mode dan dark mode
- mudah dipahami masyarakat umum
- navigasi edukasi terfokus: dropdown Edukasi hanya berisi 3 materi inti
- dashboard memiliki sidebar drawer di mobile untuk mengutamakan ruang konten

### 10.3 Keamanan

- CSRF pada form Laravel
- validasi request
- auth middleware
- admin middleware untuk area sensitif
- upload image tervalidasi

### 10.4 Performa

- route cache
- config cache
- event cache
- build production asset
- caching untuk statistik dan daftar tertentu

### 10.5 SEO

- meta description dasar
- canonical URL
- Open Graph dan Twitter meta
- FAQ structured data pada beranda

### 10.6 Kredibilitas Konten

- setiap klaim suhu aman, higiene, dan HACCP harus merujuk ke sumber resmi (WHO, Codex/FAO, ISO, BPOM, USDA) dan ditautkan pada halaman terkait. citeturn0search1turn2search0turn0search2turn2search3turn0search0

---

## 11. User Journey Utama

### 11.1 Pengguna Baru

1. Masuk ke beranda
2. Membaca penjelasan singkat SafeFood
3. Memilih salah satu jalur:
   - belajar HACCP
   - membuka artikel
   - membuka self-check
   - membandingkan nutrisi

### 11.2 Pengguna yang Ingin Mengecek Kebiasaan

1. Membuka halaman self-check
2. Membaca panduan singkat
3. Mengisi Google Form
4. Menggunakan hasil sebagai evaluasi kebiasaan pribadi

### 11.3 Pengguna yang Ingin Memilih Bahan Pangan

1. Membuka katalog bahan pangan
2. Mencari bahan tertentu
3. Membuka detail bahan
4. Melihat grafik nutrisi dan catatan penanganan
5. Membandingkan dengan bahan lain jika diperlukan

### 11.4 Admin

1. Login
2. Masuk dashboard
3. Mengelola artikel / bahan pangan / user
4. Memastikan konten yang tampil tetap relevan dan siap demo

---

## 12. KPI / Ukuran Keberhasilan

### 12.1 KPI Produk

- jumlah artikel yang dapat dipublikasikan
- jumlah bahan pangan yang memiliki profil nutrisi
- jumlah halaman publik yang dapat diakses tanpa error
- kelengkapan konten untuk demo kompetisi

### 12.2 KPI Pengguna

- jumlah pengunjung yang membuka artikel
- jumlah pengunjung yang membuka self-check
- jumlah pengguna yang mencoba perbandingan nutrisi
- durasi interaksi pada beranda dan halaman edukasi

### 12.3 KPI Presentasi

- juri dapat memahami tujuan platform dalam waktu singkat
- fitur utama dapat didemokan tanpa hambatan
- alur public dan admin dapat dijelaskan secara jelas

---

## 13. Risiko dan Batasan Saat Ini

- Self-check masih menggunakan Google Form, sehingga hasil tidak diproses langsung di sistem internal.
- Fitur `Saran` sudah tidak digunakan lagi dan tidak ditampilkan di navigasi.
- SEO sudah membaik, tetapi indexing Google tetap bergantung pada deploy, domain final, dan Google Search Console.
- `view:cache` masih terhalang oleh permission environment lokal, sehingga perlu dibersihkan pada server deploy.

---

## 14. Prioritas Pengembangan Berikutnya

### Prioritas Tinggi

- perkuat halaman Tentang Kami dengan identitas tim, institusi, dan dosen pembimbing
- tambahkan interpretasi sederhana pada detail bahan pangan, bukan hanya angka mentah
- tambahkan SEO meta per halaman artikel

### Prioritas Menengah

- kategori artikel
- artikel unggulan
- halaman referensi ilmiah / sumber edukasi
- tracking interaksi pengguna

### Prioritas Rendah

- progress belajar pengguna
- bookmark artikel
- export hasil perbandingan nutrisi

---

## 15. Ringkasan Produk

SafeFood adalah platform edukasi keamanan pangan yang sudah memiliki fondasi kuat:

- konten edukasi publik
- katalog bahan pangan
- perbandingan nutrisi
- artikel edukasi
- kuis
- self-check publik berbasis Google Form
- autentikasi standar dan social login
- dashboard admin
- manajemen artikel, bahan pangan, dan pengguna

Dokumen ini merepresentasikan kondisi produk yang saat ini benar-benar ada di codebase dan dapat digunakan sebagai acuan presentasi, pengembangan, maupun lampiran kompetisi.
