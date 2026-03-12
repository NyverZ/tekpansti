<?php

namespace App\Services;

class SafeFoodContentService
{
    public function tips(): array
    {
        return [
            'Jangan mencairkan daging beku pada suhu ruang.',
            'Pisahkan bahan pangan mentah berprotein dari makanan siap santap untuk mencegah kontaminasi silang.',
            'Simpan makanan sisa di bawah 5 C dan panaskan kembali hingga benar-benar matang sebelum disajikan.',
            'Gunakan talenan yang bersih untuk bahan segar dan talenan terpisah untuk daging mentah.',
            'Cuci tangan dengan sabun setidaknya selama 20 detik sebelum menangani makanan.',
            'Periksa label pangan dan tanggal kedaluwarsa sebelum memasak atau menyajikan makanan.',
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
                'title' => 'Dasar Keamanan Pangan',
                'description' => 'Pahami bahaya biologis, kimia, dan fisik dalam proses pengolahan makanan sehari-hari.',
                'items' => ['Suhu aman', 'Risiko kontaminasi silang', 'Kebersihan diri'],
            ],
            [
                'title' => 'Praktik Penyimpanan yang Aman',
                'description' => 'Pelajari bagaimana pendinginan, pelabelan, dan rotasi stok menjaga makanan tetap aman dan bernutrisi.',
                'items' => ['Pemahaman rantai dingin', 'Penyimpanan FIFO', 'Metode pencairan yang aman'],
            ],
            [
                'title' => 'Higiene dan Sanitasi',
                'description' => 'Bangun kebiasaan kebersihan pribadi, sanitasi alat, dan penanganan area kerja agar risiko pencemaran dapat ditekan.',
                'items' => ['Cuci tangan yang benar', 'Sanitasi alat dan permukaan', 'Kebersihan area pengolahan'],
            ],
            [
                'title' => 'Pengolahan dan Penyimpanan Pangan',
                'description' => 'Pahami titik kritis selama memasak, mendinginkan, menyimpan, dan memanaskan ulang makanan agar tetap aman dikonsumsi.',
                'items' => ['Suhu pemasakan aman', 'Pendinginan cepat', 'Pemanasan ulang yang tepat'],
            ],
            [
                'title' => 'Literasi Nutrisi',
                'description' => 'Bandingkan bahan pangan berdasarkan protein, serat, kalori, dan mikronutrien pendukung.',
                'items' => ['Panduan isi piring seimbang', 'Sumber protein', 'Membaca informasi nilai gizi'],
            ],
        ];
    }

    public function safetyCheckerQuestions(): array
    {
        return [
            [
                'key' => 'wash_hands',
                'question' => 'Apakah Anda sudah mencuci tangan dengan sabun sebelum memasak?',
                'recommendation' => 'Cuci tangan sebelum menyentuh bahan pangan, setelah memegang makanan mentah, dan setelah menyentuh permukaan dapur.',
            ],
            [
                'key' => 'clean_utensils',
                'question' => 'Apakah peralatan masak dan talenan Anda sudah bersih sebelum digunakan?',
                'recommendation' => 'Sanitasi talenan, pisau, dan permukaan persiapan sebelum serta sesudah digunakan.',
            ],
            [
                'key' => 'separate_raw_food',
                'question' => 'Apakah Anda memisahkan produk hewani mentah dari makanan siap santap?',
                'recommendation' => 'Gunakan wadah terpisah atau area persiapan khusus untuk mencegah kontaminasi silang.',
            ],
            [
                'key' => 'cold_storage',
                'question' => 'Apakah Anda segera menyimpan makanan mudah rusak ke dalam lemari pendingin?',
                'recommendation' => 'Pindahkan makanan mudah rusak ke penyimpanan dingin dalam dua jam, atau satu jam saat cuaca panas.',
            ],
            [
                'key' => 'cook_thoroughly',
                'question' => 'Apakah Anda memastikan makanan dimasak hingga matang sempurna sebelum disajikan?',
                'recommendation' => 'Gunakan termometer makanan untuk pangan berisiko tinggi dan pastikan suhu bagian dalam sudah aman.',
            ],
        ];
    }

    public function evaluateSafetyChecker(array $answers): array
    {
        $questions = collect($this->safetyCheckerQuestions());
        $positiveAnswers = collect($answers)->filter(fn ($answer) => (bool) $answer)->count();
        $score = (int) round(($positiveAnswers / max($questions->count(), 1)) * 100);

        $status = match (true) {
            $score >= 85 => 'Sangat Baik',
            $score >= 65 => 'Baik',
            $score >= 45 => 'Perlu Peningkatan',
            default => 'Risiko Tinggi',
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
            'Lakukan analisis bahaya untuk mengidentifikasi risiko biologis, kimia, dan fisik.',
            'Tentukan titik kendali kritis tempat risiko dapat dicegah atau dikurangi.',
            'Tetapkan batas kritis seperti target waktu, suhu, atau pH.',
            'Buat prosedur pemantauan untuk setiap titik kendali kritis.',
            'Tentukan tindakan korektif ketika hasil pemantauan menunjukkan penyimpangan.',
            'Verifikasi sistem HACCP secara berkala melalui audit, pengujian, dan peninjauan.',
            'Simpan catatan dan dokumentasi yang jelas untuk kebutuhan penelusuran.',
        ];
    }

    public function haccpExamples(): array
    {
        return [
            [
                'title' => 'Penyajian Nasi Ayam',
                'hazard' => 'Pertumbuhan Salmonella akibat proses pemasakan yang kurang matang atau kegagalan menjaga suhu panas.',
                'ccp' => 'Tahap pemasakan dan penahanan panas.',
                'limit' => 'Suhu inti mencapai 75 C dan suhu penahanan panas tetap di atas 60 C.',
            ],
            [
                'title' => 'Persiapan Potongan Buah Segar',
                'hazard' => 'Kontaminasi silang dari pisau, tangan, atau kemasan yang tidak bersih.',
                'ccp' => 'Sanitasi area pencucian, pemotongan, dan pengemasan.',
                'limit' => 'Peralatan telah disanitasi, air pencuci layak pakai, dan penyimpanan dingin di bawah 5 C.',
            ],
        ];
    }

    public function haccpChecklist(): array
    {
        return [
            'Daftarkan semua bahan, pemasok, dan kebutuhan penyimpanannya.',
            'Petakan setiap tahap proses dari penerimaan hingga penyajian.',
            'Identifikasi suhu kritis, alergen, dan risiko kontaminasi.',
            'Siapkan log pemantauan untuk proses memasak, pendinginan, dan penyimpanan.',
            'Latih petugas mengenai kebersihan, sanitasi, dan prosedur tindakan korektif.',
            'Tinjau catatan setiap minggu dan verifikasi proses melalui audit internal.',
        ];
    }

    public function quizQuestions(): array
    {
        return [
            [
                'question' => 'Apa langkah pertama sebelum menangani makanan?',
                'options' => ['Menyiapkan piring', 'Mencuci tangan dengan sabun', 'Mencicipi bahan makanan'],
                'answer' => 1,
            ],
            [
                'question' => 'Mengapa ayam mentah harus disimpan terpisah?',
                'options' => ['Agar menghemat ruang rak', 'Agar tetap lebih dingin', 'Untuk mencegah kontaminasi silang'],
                'answer' => 2,
            ],
            [
                'question' => 'Di mana makanan sisa sebaiknya disimpan setelah sedikit mendingin?',
                'options' => ['Pada suhu ruang', 'Di dalam lemari pendingin', 'Dekat kompor'],
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
                'title' => 'Tim Lintas Disiplin',
                'description' => 'Dikembangkan oleh mahasiswa teknologi pangan dan sistem informasi untuk menggabungkan akurasi ilmiah dengan UX yang mudah diakses.',
            ],
            [
                'title' => 'Fokus Siap Kompetisi',
                'description' => 'Platform ini dirancang untuk menampilkan nilai edukasi, dampak terukur, dan stabilitas teknis.',
            ],
            [
                'title' => 'Pusat Pembelajaran yang Skalabel',
                'description' => 'SafeFood disusun agar mudah dikembangkan menjadi platform dengan diagnostik yang lebih kaya, studi kasus, dan fitur keterlibatan komunitas.',
            ],
        ];
    }

    public function hygieneSanitationSections(): array
    {
        return [
            [
                'title' => 'Mengapa higiene dan sanitasi penting?',
                'description' => 'Higiene berfokus pada kebersihan individu, sedangkan sanitasi berfokus pada kebersihan alat, permukaan, dan lingkungan pengolahan. Keduanya saling melengkapi untuk mencegah mikroorganisme berpindah ke makanan yang akan dikonsumsi.',
                'points' => [
                    'Tangan, kain lap, talenan, dan pisau adalah jalur kontaminasi yang paling sering terjadi di dapur.',
                    'Makanan yang tampak bersih belum tentu aman jika ditangani dengan alat atau permukaan yang tercemar.',
                    'Kebiasaan kecil seperti mencuci tangan dan membersihkan meja kerja memberi dampak besar pada kesehatan keluarga.',
                ],
            ],
            [
                'title' => 'Praktik higiene pribadi yang wajib dilakukan',
                'description' => 'Setiap orang yang menyiapkan makanan perlu menjaga kebersihan diri sebelum, selama, dan setelah proses pengolahan.',
                'points' => [
                    'Cuci tangan dengan sabun dan air mengalir minimal 20 detik sebelum memasak dan setelah memegang bahan mentah.',
                    'Gunakan pakaian bersih, ikat rambut, dan tutup luka dengan plester tahan air sebelum menangani pangan.',
                    'Hindari menyiapkan makanan ketika sedang sakit, terutama saat mengalami diare, muntah, atau demam.',
                ],
            ],
            [
                'title' => 'Sanitasi alat, permukaan, dan area kerja',
                'description' => 'Alat dan permukaan yang tampak bersih belum tentu bebas dari bakteri. Sanitasi harus dilakukan secara rutin dan benar.',
                'points' => [
                    'Pisahkan talenan untuk bahan mentah dan bahan siap santap agar kontaminasi silang dapat dicegah.',
                    'Cuci peralatan dengan air bersih dan sabun, lalu keringkan sebelum digunakan kembali.',
                    'Bersihkan meja, gagang kulkas, wastafel, dan area sentuh tinggi secara berkala sepanjang hari.',
                ],
            ],
        ];
    }

    public function hygieneSanitationChecklist(): array
    {
        return [
            'Cuci tangan sebelum memegang makanan dan setelah menyentuh bahan mentah.',
            'Gunakan alat masak yang bersih dan kering.',
            'Pisahkan bahan mentah dari makanan matang atau siap makan.',
            'Ganti kain lap atau spons yang kotor secara berkala.',
            'Jaga tempat sampah tetap tertutup dan rutin dibersihkan.',
        ];
    }

    public function foodProcessingStorageSections(): array
    {
        return [
            [
                'title' => 'Pengolahan pangan yang aman dimulai dari suhu',
                'description' => 'Banyak bahaya pangan dapat dikendalikan melalui pemasakan yang cukup. Suhu membantu membunuh mikroorganisme yang berisiko menyebabkan penyakit.',
                'points' => [
                    'Masak bahan berisiko tinggi seperti ayam, telur, daging, dan makanan laut hingga benar-benar matang.',
                    'Gunakan termometer makanan jika tersedia, terutama untuk produk hewani dan makanan dalam porsi besar.',
                    'Jangan mencampur makanan matang dengan alat atau wadah yang sebelumnya dipakai untuk bahan mentah.',
                ],
            ],
            [
                'title' => 'Pendinginan dan penyimpanan yang benar',
                'description' => 'Setelah makanan matang, proses pendinginan dan penyimpanan harus dilakukan dengan cepat agar bakteri tidak berkembang.',
                'points' => [
                    'Simpan makanan mudah rusak dalam lemari pendingin secepat mungkin, idealnya tidak lebih dari dua jam pada suhu ruang.',
                    'Gunakan wadah tertutup dan beri label tanggal untuk membantu rotasi stok.',
                    'Tempatkan bahan mentah di rak bawah agar cairan tidak menetes ke makanan siap santap.',
                ],
            ],
            [
                'title' => 'Pemanasan ulang dan pengelolaan sisa makanan',
                'description' => 'Makanan sisa tetap bisa aman dikonsumsi bila dipanaskan kembali secara menyeluruh dan tidak disimpan terlalu lama.',
                'points' => [
                    'Panaskan ulang makanan hingga merata, bukan hanya hangat di bagian luar.',
                    'Hindari memanaskan ulang makanan berulang kali karena mutu dan keamanannya akan menurun.',
                    'Buang makanan yang berbau, berubah warna, atau sudah terlalu lama disimpan.',
                ],
            ],
        ];
    }

    public function foodProcessingStorageCriticalPoints(): array
    {
        return [
            [
                'title' => 'Saat menerima bahan pangan',
                'description' => 'Periksa kesegaran, kebersihan kemasan, dan suhu bahan yang mudah rusak sebelum disimpan atau diolah.',
            ],
            [
                'title' => 'Saat memasak',
                'description' => 'Pastikan bahan matang merata dan gunakan alat yang berbeda untuk bahan mentah dan matang.',
            ],
            [
                'title' => 'Saat menyimpan',
                'description' => 'Gunakan prinsip FIFO, wadah tertutup, dan suhu penyimpanan yang sesuai dengan jenis pangan.',
            ],
            [
                'title' => 'Saat menyajikan kembali',
                'description' => 'Panaskan ulang makanan secara menyeluruh dan jangan menggabungkan sisa baru dengan sisa lama.',
            ],
        ];
    }
}
