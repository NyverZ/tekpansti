<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            $this->makeArticle(
                'Apa Itu HACCP dan Mengapa Penting dalam Keamanan Pangan',
                'apa-itu-haccp-dan-mengapa-penting-dalam-keamanan-pangan',
                'HACCP adalah sistem pencegahan yang membantu mengidentifikasi bahaya pangan sebelum menimbulkan masalah kesehatan. Pendekatan ini penting karena fokus pada pengendalian risiko sejak awal proses pengolahan makanan.',
                'Hazard Analysis and Critical Control Points atau HACCP merupakan pendekatan sistematis untuk menjaga keamanan pangan. Sistem ini banyak digunakan di industri makanan, katering, rumah sakit, sekolah, dan dapur komersial karena membantu mencegah bahaya biologis, kimia, dan fisik.',
                [
                    'Prinsip utama HACCP adalah mengenali titik proses yang paling berisiko, seperti penerimaan bahan baku, penyimpanan dingin, pemasakan, pendinginan, dan penyajian. Pada setiap titik tersebut, pengelola pangan menetapkan batas aman, cara pemantauan, serta tindakan korektif jika terjadi penyimpangan.',
                    'Keunggulan HACCP adalah sifatnya yang preventif. Daripada menunggu makanan menyebabkan penyakit, sistem ini membantu penjamah makanan mengendalikan risiko sebelum produk sampai ke konsumen. Dalam edukasi publik, HACCP juga memperlihatkan bahwa keamanan pangan bukan sekadar kebiasaan, tetapi proses yang dapat diukur dan dikelola.',
                ],
                [
                    'Kenali titik proses yang paling berisiko pada setiap jenis makanan.',
                    'Pastikan suhu simpan dan suhu masak dipantau secara rutin.',
                    'Buat prosedur sederhana agar semua petugas memahami langkah aman.',
                    'Lakukan tindakan korektif segera ketika ditemukan penyimpangan.',
                ],
                'HACCP penting karena membantu menjaga pangan tetap aman dari awal hingga akhir proses. Dengan memahami prinsip ini, masyarakat dan pelaku usaha pangan dapat membangun sistem kerja yang lebih aman, konsisten, dan bertanggung jawab.'
            ),
            $this->makeArticle(
                'Pentingnya Higiene Pangan untuk Mencegah Penyakit Bawaan Makanan',
                'pentingnya-higiene-pangan-untuk-mencegah-penyakit-bawaan-makanan',
                'Higiene pangan meliputi kebiasaan dan kondisi yang menjaga makanan tetap bersih selama penyimpanan, persiapan, dan penyajian. Praktik ini menjadi dasar untuk mencegah penyakit bawaan makanan pada keluarga maupun masyarakat luas.',
                'Banyak kasus penyakit bawaan makanan berawal dari kebiasaan sederhana yang diabaikan, seperti tangan yang tidak dicuci, talenan yang kotor, atau air yang tidak aman. Karena itu, higiene pangan harus dipahami sebagai kebiasaan harian yang melindungi kesehatan.',
                [
                    'Makanan bisa tampak segar, beraroma normal, dan tetap mengandung mikroorganisme berbahaya. Inilah alasan mengapa kebersihan tidak boleh bergantung pada tampilan makanan saja. Proses yang bersih dan alat yang higienis jauh lebih penting daripada sekadar penampilan.',
                    'Higiene pangan tidak hanya berlaku di restoran besar. Dapur rumah tangga, warung, kantin sekolah, hingga pedagang kaki lima semuanya membutuhkan standar kebersihan dasar. Ketika kebersihan dijaga dengan konsisten, risiko diare, muntah, demam, dan keracunan makanan bisa ditekan secara signifikan.',
                ],
                [
                    'Cuci tangan sebelum menyiapkan makanan dan setelah menyentuh bahan mentah.',
                    'Gunakan air bersih untuk mencuci, memasak, dan membuat minuman.',
                    'Bersihkan peralatan dan permukaan dapur setelah selesai digunakan.',
                    'Simpan sampah dapur di wadah tertutup dan buang secara teratur.',
                ],
                'Higiene pangan merupakan pertahanan pertama terhadap kontaminasi. Semakin baik kebiasaan kebersihan diterapkan, semakin kecil kemungkinan makanan menjadi sumber penyakit.'
            ),
            $this->makeArticle(
                'Cara Menyimpan Pangan dengan Aman di Rumah',
                'cara-menyimpan-pangan-dengan-aman-di-rumah',
                'Penyimpanan yang aman membantu menjaga mutu pangan sekaligus mencegah pertumbuhan mikroorganisme berbahaya. Pengaturan suhu, wadah, dan penempatan bahan makanan berperan besar dalam keamanan pangan di rumah.',
                'Setelah membeli atau memasak makanan, tahap berikutnya yang sering diabaikan adalah penyimpanan. Padahal, penyimpanan yang tidak tepat dapat membuat makanan cepat rusak, terkontaminasi, atau kehilangan kualitasnya.',
                [
                    'Bahan pangan mudah rusak seperti daging, ikan, susu, telur, dan makanan matang harus segera dimasukkan ke lemari pendingin. Menunda pendinginan terlalu lama dapat memberi kesempatan bakteri berkembang biak dengan cepat, terutama di iklim tropis.',
                    'Pemisahan bahan mentah dan makanan siap santap juga sangat penting. Simpan daging atau ikan mentah dalam wadah tertutup pada rak bawah agar cairannya tidak menetes ke bahan lain. Selain itu, beri label tanggal pada sisa makanan agar keluarga tahu kapan makanan sebaiknya dihabiskan.',
                ],
                [
                    'Masukkan bahan pangan mudah rusak ke kulkas maksimal dua jam setelah dibeli atau dimasak.',
                    'Gunakan wadah tertutup yang bersih untuk menyimpan makanan.',
                    'Letakkan daging dan ikan mentah di rak bawah kulkas.',
                    'Beri label tanggal pada sisa makanan dan habiskan secepatnya.',
                ],
                'Penyimpanan yang aman membuat makanan tetap berkualitas dan lebih aman dikonsumsi. Dengan mengatur suhu, posisi, dan wadah secara benar, dapur rumah tangga menjadi lebih sehat dan efisien.'
            ),
            $this->makeArticle(
                'Memahami Kontaminasi Silang di Dapur',
                'memahami-kontaminasi-silang-di-dapur',
                'Kontaminasi silang terjadi ketika mikroorganisme, alergen, atau kotoran berpindah dari satu bahan atau permukaan ke bahan lainnya. Risiko ini sering terjadi di dapur rumah dan dapat dicegah dengan pemisahan serta sanitasi yang baik.',
                'Banyak orang menganggap makanan sudah aman hanya karena bahan utamanya segar. Padahal, makanan yang awalnya aman bisa menjadi berbahaya jika terkena kontaminasi silang selama proses penyiapan.',
                [
                    'Contoh paling umum adalah menggunakan talenan yang sama untuk ayam mentah dan sayuran tanpa dicuci terlebih dahulu. Bakteri dari ayam mentah dapat berpindah ke sayuran yang mungkin dimakan tanpa pemanasan tambahan. Hal yang sama dapat terjadi melalui pisau, tangan, piring, kain lap, dan wadah penyimpanan.',
                    'Kontaminasi silang juga penting diperhatikan pada alergen. Misalnya, sisa kacang pada peralatan dapur dapat memicu reaksi alergi pada orang yang sensitif. Karena itu, pemisahan alat, alur kerja yang bersih, dan penyimpanan yang tertata merupakan bagian penting dari keamanan pangan.',
                ],
                [
                    'Gunakan talenan berbeda untuk bahan mentah dan makanan siap santap.',
                    'Cuci tangan setiap kali berpindah dari satu bahan ke bahan lain.',
                    'Sanitasi pisau, meja, dan wadah setelah kontak dengan bahan mentah.',
                    'Simpan bahan mentah terpisah dari makanan matang dan buah siap makan.',
                ],
                'Kontaminasi silang dapat terjadi sangat cepat, tetapi pencegahannya juga sederhana. Dengan pemisahan, pencucian, dan sanitasi yang konsisten, risiko ini bisa ditekan secara efektif.'
            ),
            $this->makeArticle(
                'Suhu Memasak Aman untuk Bahan Pangan Umum',
                'suhu-memasak-aman-untuk-bahan-pangan-umum',
                'Suhu memasak yang tepat membantu membunuh mikroorganisme berbahaya pada makanan. Pemahaman tentang suhu aman sangat penting terutama untuk unggas, daging, seafood, telur, dan makanan sisa.',
                'Memasak bukan hanya soal rasa dan tekstur, tetapi juga soal keamanan. Banyak mikroorganisme penyebab penyakit dapat dihancurkan dengan panas, asalkan makanan mencapai suhu internal yang cukup.',
                [
                    'Unggas seperti ayam sebaiknya dimasak hingga suhu internal minimal 75 derajat Celsius. Daging giling juga perlu dimasak hingga benar-benar matang karena bakteri dapat tersebar di seluruh bagian selama proses penggilingan. Ikan umumnya aman ketika dagingnya berubah buram dan mudah dipisahkan.',
                    'Pemanasan ulang makanan sisa harus dilakukan hingga makanan benar-benar panas merata. Hanya memanaskan bagian luar tidak cukup untuk menjamin keamanan. Termometer makanan sangat membantu karena warna dan tekstur tidak selalu menunjukkan tingkat kematangan yang aman.',
                ],
                [
                    'Masak ayam dan unggas lain hingga benar-benar matang.',
                    'Panaskan ulang makanan sisa sampai panas merata.',
                    'Gunakan termometer makanan bila tersedia.',
                    'Jangan menyajikan telur setengah matang untuk kelompok rentan.',
                ],
                'Memahami suhu aman membuat proses memasak lebih terukur dan lebih aman. Dengan pengendalian panas yang tepat, risiko penyakit bawaan makanan dapat berkurang secara nyata.'
            ),
            $this->makeArticle(
                'Bagaimana Keracunan Makanan Terjadi dan Cara Mencegahnya',
                'bagaimana-keracunan-makanan-terjadi-dan-cara-mencegahnya',
                'Keracunan makanan terjadi ketika seseorang mengonsumsi makanan atau minuman yang terkontaminasi mikroorganisme, racun, atau bahan kimia berbahaya. Pencegahan yang baik bergantung pada kebersihan, suhu aman, dan penanganan makanan yang benar.',
                'Keracunan makanan dapat menyerang siapa saja, tetapi anak-anak, lansia, ibu hamil, dan orang dengan daya tahan tubuh rendah memiliki risiko lebih tinggi mengalami dampak yang berat. Karena itu, edukasi pencegahan sangat penting bagi semua kalangan.',
                [
                    'Kontaminasi bisa terjadi di banyak titik, mulai dari produksi, distribusi, pembelian, penyimpanan, hingga penyajian. Makanan yang dibiarkan terlalu lama pada suhu ruang, dimasak kurang matang, atau disentuh tangan yang tidak bersih berisiko lebih tinggi menyebabkan penyakit.',
                    'Masalah lain adalah makanan terkontaminasi tidak selalu terlihat mencurigakan. Bau dan warna yang masih normal bukan jaminan bahwa makanan aman. Oleh karena itu, pencegahan harus didasarkan pada proses yang higienis, bukan sekadar pengamatan visual.',
                ],
                [
                    'Cuci tangan, alat, dan permukaan kerja sebelum dan selama memasak.',
                    'Masak bahan pangan hingga matang sempurna.',
                    'Simpan makanan panas tetap panas dan makanan dingin tetap dingin.',
                    'Jangan biarkan makanan matang terlalu lama di suhu ruang.',
                ],
                'Keracunan makanan dapat dicegah dengan kebiasaan yang benar. Semakin baik masyarakat memahami cara kontaminasi terjadi, semakin mudah mereka melindungi diri dan keluarganya.'
            ),
            $this->makeArticle(
                'Peran Nutrisi dalam Mendukung Keamanan Pangan',
                'peran-nutrisi-dalam-mendukung-keamanan-pangan',
                'Nutrisi dan keamanan pangan saling berkaitan karena makanan yang sehat harus sekaligus aman dikonsumsi. Edukasi pangan yang baik perlu mengajarkan keduanya secara bersamaan agar masyarakat dapat membuat pilihan yang lebih tepat.',
                'Banyak orang fokus pada kandungan protein, vitamin, atau serat tanpa memperhatikan cara pangan ditangani. Padahal, nilai gizi yang baik tidak akan memberi manfaat bila makanan tercemar atau disimpan dengan tidak aman.',
                [
                    'Bahan makanan bergizi seperti susu, telur, daging, ikan, buah, dan sayur membutuhkan penanganan yang tepat. Misalnya, sayuran segar tetap harus dicuci sebelum dikonsumsi, dan protein hewani tetap harus disimpan pada suhu dingin serta dimasak dengan baik.',
                    'Pemahaman nutrisi juga dapat mendorong perilaku pangan yang lebih aman. Orang yang merencanakan menu dengan baik cenderung lebih disiplin dalam belanja, penyimpanan, serta pengolahan makanan. Hal ini mengurangi pemborosan dan menurunkan risiko makanan rusak atau dipanaskan berulang kali.',
                ],
                [
                    'Pilih bahan pangan bergizi dari sumber yang bersih dan tepercaya.',
                    'Cuci buah dan sayur sebelum diolah atau dikonsumsi.',
                    'Simpan bahan berprotein tinggi pada suhu dingin yang aman.',
                    'Rencanakan menu agar makanan cepat habis dan tidak terlalu lama disimpan.',
                ],
                'Keamanan pangan dan nutrisi seharusnya berjalan bersama. Dengan memahami keduanya, masyarakat dapat membangun pola makan yang tidak hanya sehat, tetapi juga aman bagi tubuh.'
            ),
            $this->makeArticle(
                'Kebersihan Pribadi bagi Penjamah Makanan',
                'kebersihan-pribadi-bagi-penjamah-makanan',
                'Kebersihan pribadi merupakan langkah dasar untuk mencegah pencemaran makanan selama proses pengolahan dan penyajian. Penjamah makanan memiliki tanggung jawab langsung terhadap keamanan pangan yang dikonsumsi orang lain.',
                'Makanan yang baik bisa menjadi tidak aman jika ditangani oleh orang yang tidak menjaga kebersihan. Karena itu, penjamah makanan perlu memahami bahwa kondisi tubuh dan kebiasaannya berpengaruh langsung pada kesehatan konsumen.',
                [
                    'Tangan merupakan media perpindahan kuman yang paling umum. Menyentuh bahan mentah, uang, wajah, ponsel, atau sampah lalu langsung memegang makanan dapat menimbulkan kontaminasi. Cuci tangan dengan sabun dan air mengalir adalah tindakan sederhana yang sangat efektif untuk memutus rantai penularan.',
                    'Selain tangan, kebersihan pakaian, kuku, rambut, dan luka terbuka juga penting. Penjamah makanan yang sedang sakit, terutama diare atau muntah, sebaiknya tidak menyiapkan makanan untuk orang lain. Dalam konteks usaha pangan, kebijakan ini sangat penting untuk mencegah wabah kecil di lingkungan layanan makanan.',
                ],
                [
                    'Cuci tangan minimal 20 detik sebelum dan sesudah menangani makanan.',
                    'Gunakan pakaian bersih dan jaga rambut agar tidak jatuh ke makanan.',
                    'Tutup luka dengan penutup tahan air sebelum bekerja.',
                    'Hindari menyiapkan makanan ketika sedang sakit.',
                ],
                'Kebersihan pribadi adalah pondasi keamanan pangan. Ketika penjamah makanan menjaga kebersihan diri dengan disiplin, makanan menjadi lebih aman untuk semua orang.'
            ),
            $this->makeArticle(
                'Penanganan Aman Daging, Ikan, dan Unggas',
                'penanganan-aman-daging-ikan-dan-unggas',
                'Daging, ikan, dan unggas adalah sumber protein penting, tetapi juga termasuk bahan pangan yang mudah rusak. Penanganan yang benar sejak pembelian hingga penyajian sangat menentukan tingkat keamanannya.',
                'Produk hewani memerlukan perhatian khusus karena dapat membawa bakteri patogen dan cepat mengalami kerusakan bila tidak disimpan dengan baik. Oleh sebab itu, setiap tahap penanganannya perlu diperhatikan.',
                [
                    'Saat membeli, pilih produk yang masih dingin, tidak berbau menyengat, dan berasal dari penjual yang bersih. Setelah dibawa pulang, bahan tersebut harus segera didinginkan atau dibekukan. Menunda penyimpanan dapat mempercepat pertumbuhan mikroorganisme yang merugikan.',
                    'Di dapur, bahan hewani mentah perlu dipisahkan dari makanan siap santap. Gunakan wadah tertutup, talenan terpisah, dan masak hingga matang. Jika ingin mencairkan bahan beku, lakukan di kulkas atau di bawah aliran air dingin, bukan di meja dapur terlalu lama.',
                ],
                [
                    'Simpan daging, ikan, dan unggas dalam wadah tertutup di rak bawah kulkas.',
                    'Pisahkan alat untuk bahan mentah dan makanan matang.',
                    'Masak hingga matang sempurna sebelum disajikan.',
                    'Bekukan bahan yang tidak segera digunakan.',
                ],
                'Penanganan aman produk hewani memerlukan ketelitian, tetapi manfaatnya besar bagi kesehatan. Dengan langkah yang tepat, risiko kontaminasi dan kerusakan pangan dapat ditekan secara efektif.'
            ),
            $this->makeArticle(
                'Kesalahan Umum Keamanan Pangan di Rumah',
                'kesalahan-umum-keamanan-pangan-di-rumah',
                'Banyak masalah keamanan pangan di rumah disebabkan oleh kebiasaan kecil yang sering dianggap sepele. Mengenali kesalahan umum membantu keluarga memperbaiki rutinitas dapur dan mengurangi risiko penyakit.',
                'Dapur rumah sering terasa aman karena digunakan setiap hari, tetapi rasa familiar ini justru bisa membuat orang lengah. Kebiasaan lama yang kurang tepat sering dilakukan tanpa disadari.',
                [
                    'Kesalahan yang sering terjadi antara lain tidak mencuci tangan pada waktu yang tepat, menggunakan alat yang sama untuk bahan mentah dan matang, menyimpan sisa makanan terlalu lama di suhu ruang, serta terlalu mengandalkan bau dan tampilan untuk menilai keamanan makanan.',
                    'Masalah lain adalah mengisi kulkas terlalu penuh, memanaskan ulang makanan secara tidak merata, dan mencairkan bahan beku di atas meja dapur. Kebiasaan seperti ini meningkatkan risiko pertumbuhan bakteri dan kontaminasi silang.',
                ],
                [
                    'Cuci tangan berulang selama proses memasak, bukan hanya di awal.',
                    'Jangan gunakan talenan yang sama untuk bahan mentah dan matang tanpa dicuci.',
                    'Masukkan sisa makanan ke kulkas sesegera mungkin.',
                    'Susun kulkas dengan rapi agar suhu dingin tersebar merata.',
                ],
                'Sebagian besar kesalahan keamanan pangan di rumah dapat diperbaiki dengan kesadaran dan kebiasaan baru. Langkah kecil yang konsisten akan memberi dampak besar bagi kesehatan keluarga.'
            ),
            $this->makeArticle(
                'Pentingnya Mencuci Tangan Sebelum Mengolah Makanan',
                'pentingnya-mencuci-tangan-sebelum-mengolah-makanan',
                'Mencuci tangan adalah langkah sederhana yang sangat efektif untuk mencegah kontaminasi pangan. Kebiasaan ini penting sebelum menyiapkan, menyajikan, atau menyentuh makanan siap santap.',
                'Tangan sering menyentuh banyak permukaan setiap hari, mulai dari gagang pintu hingga telepon genggam. Tanpa cuci tangan yang benar, kuman dari benda-benda tersebut dapat berpindah ke makanan.',
                [
                    'Sabun dan air mengalir membantu mengangkat lemak, kotoran, serta mikroorganisme yang menempel pada kulit. Air saja tidak cukup, terutama setelah memegang bahan mentah atau setelah menggunakan toilet.',
                    'Cuci tangan perlu dilakukan pada waktu yang tepat, misalnya sebelum memasak, setelah memegang daging mentah, setelah membuang sampah, dan setelah batuk atau bersin. Kedisiplinan ini sangat menentukan keamanan makanan di rumah maupun tempat usaha.',
                ],
                [
                    'Gunakan sabun dan air mengalir saat mencuci tangan.',
                    'Gosok seluruh bagian tangan minimal 20 detik.',
                    'Keringkan tangan dengan kain bersih atau tisu sekali pakai.',
                    'Biasakan cuci tangan setiap kali berpindah aktivitas di dapur.',
                ],
                'Cuci tangan bukan sekadar kebiasaan bersih, tetapi langkah nyata untuk melindungi kesehatan. Semakin konsisten dilakukan, semakin kecil kemungkinan makanan terkontaminasi.'
            ),
            $this->makeArticle(
                'Cara Aman Menyimpan Sisa Makanan',
                'cara-aman-menyimpan-sisa-makanan',
                'Sisa makanan dapat tetap aman dan praktis bila disimpan dengan benar. Jika ditangani secara sembarangan, makanan sisa justru berisiko menimbulkan keracunan makanan.',
                'Setelah makan bersama atau memasak dalam jumlah besar, makanan sisa sering disimpan untuk dikonsumsi kembali. Langkah ini hemat, tetapi harus disertai pengelolaan yang aman.',
                [
                    'Makanan sisa sebaiknya tidak dibiarkan pada suhu ruang terlalu lama. Dalam kondisi hangat, bakteri dapat berkembang dengan cepat. Karena itu, makanan perlu didinginkan dan dimasukkan ke kulkas sesegera mungkin dalam wadah bersih dan tertutup.',
                    'Saat akan dimakan kembali, makanan sisa perlu dipanaskan hingga panas merata. Membagi makanan ke dalam wadah kecil membantu proses pendinginan dan pemanasan ulang agar lebih aman.',
                ],
                [
                    'Simpan sisa makanan dalam wadah dangkal agar cepat dingin.',
                    'Masukkan ke kulkas maksimal dua jam setelah dimasak.',
                    'Beri label tanggal penyimpanan.',
                    'Panaskan kembali sampai benar-benar panas merata sebelum disajikan.',
                ],
                'Sisa makanan dapat tetap aman jika dikelola dengan benar. Pengaturan waktu, suhu, dan wadah penyimpanan menjadi kunci utamanya.'
            ),
            $this->makeArticle(
                'Memilih Jajanan dan Makanan Jalanan yang Lebih Aman',
                'memilih-jajanan-dan-makanan-jalanan-yang-lebih-aman',
                'Jajanan dan makanan jalanan merupakan bagian penting dari budaya makan masyarakat, tetapi pemilihannya perlu dilakukan dengan bijak. Konsumen dapat menurunkan risiko penyakit dengan memperhatikan kebersihan dan cara penanganan pangan oleh penjual.',
                'Makanan jalanan sering menarik karena praktis, terjangkau, dan mudah ditemukan. Namun, kondisi pengolahan dan penyajiannya sangat bervariasi sehingga konsumen perlu lebih teliti sebelum membeli.',
                [
                    'Perhatikan kebersihan gerobak, peralatan, serta tangan penjual. Makanan yang dibiarkan terbuka tanpa pelindung lebih rentan terkena debu, lalat, dan pencemaran lingkungan.',
                    'Pilih makanan yang baru dimasak atau masih panas ketika disajikan. Minuman dengan es sebaiknya dibeli dari penjual yang menggunakan air bersih. Hindari membeli makanan dengan warna, bau, atau tekstur yang terlihat tidak biasa.',
                ],
                [
                    'Pilih penjual dengan area kerja yang tampak bersih dan rapi.',
                    'Utamakan makanan yang dimasak segar dan disajikan panas.',
                    'Hindari makanan yang dibiarkan terbuka terlalu lama.',
                    'Perhatikan kualitas air, es, dan kemasan yang digunakan.',
                ],
                'Makanan jalanan bisa tetap dinikmati dengan aman bila dipilih secara cermat. Konsumen yang lebih sadar akan membantu mendorong standar kebersihan yang lebih baik.'
            ),
            $this->makeArticle(
                'Bahaya Makanan yang Dibiarkan di Suhu Ruang',
                'bahaya-makanan-yang-dibiarkan-di-suhu-ruang',
                'Makanan yang dibiarkan terlalu lama pada suhu ruang berisiko menjadi tempat berkembang biaknya mikroorganisme berbahaya. Kondisi ini sering terjadi di rumah dan menjadi penyebab umum keracunan makanan.',
                'Banyak orang menganggap makanan matang aman selama belum terlihat rusak. Padahal, suhu ruang dapat menjadi kondisi ideal bagi bakteri untuk berkembang, terutama pada makanan berkuah, nasi, daging, dan lauk yang kaya protein.',
                [
                    'Ketika makanan dibiarkan terlalu lama tanpa pendinginan, jumlah mikroorganisme dapat meningkat hingga mencapai tingkat yang berbahaya. Beberapa bakteri bahkan dapat menghasilkan racun yang tidak hilang meski makanan dipanaskan ulang.',
                    'Risiko semakin besar pada cuaca panas atau ruangan yang lembap. Karena itu, makanan matang yang tidak segera dikonsumsi perlu dipindahkan ke wadah yang sesuai dan didinginkan secepat mungkin.',
                ],
                [
                    'Jangan biarkan makanan matang terlalu lama di meja makan.',
                    'Segera simpan makanan ke kulkas bila tidak langsung dikonsumsi.',
                    'Bagi makanan dalam porsi kecil agar lebih cepat dingin.',
                    'Hangatkan kembali makanan hanya saat akan disajikan.',
                ],
                'Suhu ruang bukan tempat yang aman untuk makanan dalam waktu lama. Dengan memahami risiko ini, masyarakat dapat lebih disiplin dalam mengatur waktu penyimpanan makanan.'
            ),
            $this->makeArticle(
                'Cara Aman Mencuci Buah dan Sayur',
                'cara-aman-mencuci-buah-dan-sayur',
                'Buah dan sayur perlu dicuci dengan benar untuk mengurangi tanah, kotoran, residu, dan potensi kontaminan di permukaannya. Pencucian yang aman membantu menjaga kualitas sekaligus menurunkan risiko penyakit.',
                'Buah dan sayur merupakan bagian penting dari pola makan sehat, tetapi bahan ini juga dapat terkontaminasi selama penanaman, distribusi, dan penjualan.',
                [
                    'Pencucian sebaiknya dilakukan menggunakan air bersih mengalir. Menggosok permukaan buah atau sayur secara perlahan membantu melepaskan kotoran yang menempel. Untuk sayuran berdaun, setiap lembar dapat dipisahkan agar pencucian lebih efektif.',
                    'Buah berkulit tebal seperti melon atau semangka tetap perlu dicuci sebelum dipotong agar kotoran di kulit tidak berpindah ke bagian dalam saat pisau digunakan. Hindari penggunaan sabun atau bahan kimia yang tidak diperuntukkan bagi pangan.',
                ],
                [
                    'Gunakan air mengalir yang bersih untuk mencuci buah dan sayur.',
                    'Pisahkan sayuran yang rusak atau busuk sebelum dicuci.',
                    'Cuci buah berkulit tebal sebelum dipotong.',
                    'Gunakan wadah dan talenan yang bersih setelah pencucian.',
                ],
                'Pencucian buah dan sayur yang benar adalah langkah sederhana dengan manfaat besar. Kebiasaan ini membantu membuat konsumsi pangan segar menjadi lebih aman.'
            ),
            $this->makeArticle(
                'Mengapa Label Kedaluwarsa Perlu Diperhatikan',
                'mengapa-label-kedaluwarsa-perlu-diperhatikan',
                'Label kedaluwarsa memberi informasi penting tentang keamanan dan mutu pangan. Memahami arti label pada kemasan membantu konsumen mengambil keputusan yang lebih aman saat membeli dan mengonsumsi makanan.',
                'Banyak orang masih bingung membedakan tanggal kedaluwarsa, tanggal terbaik digunakan sebelum, atau tanggal produksi. Padahal, informasi tersebut sangat berguna untuk menilai kualitas dan risiko pangan kemasan.',
                [
                    'Tanggal kedaluwarsa umumnya menunjukkan batas aman konsumsi untuk produk tertentu. Setelah melewati tanggal tersebut, risiko penurunan mutu atau keamanan bisa meningkat. Sementara itu, beberapa label lain lebih menekankan kualitas terbaik.',
                    'Selain memperhatikan label, konsumen juga perlu memeriksa kondisi kemasan. Kaleng yang menggembung, segel rusak, kebocoran, atau kemasan yang berubah bentuk harus dihindari meskipun tanggalnya masih berlaku.',
                ],
                [
                    'Baca label tanggal sebelum membeli produk pangan kemasan.',
                    'Hindari kemasan penyok, bocor, atau menggembung.',
                    'Ikuti petunjuk penyimpanan setelah kemasan dibuka.',
                    'Gunakan prinsip beli secukupnya agar produk tidak menumpuk terlalu lama.',
                ],
                'Memahami label kedaluwarsa membantu konsumen lebih cermat dan aman dalam memilih pangan. Kebiasaan sederhana ini dapat mengurangi pemborosan sekaligus menurunkan risiko konsumsi produk yang tidak layak.'
            ),
            $this->makeArticle(
                'Penyimpanan Aman Susu dan Produk Olahannya',
                'penyimpanan-aman-susu-dan-produk-olahannya',
                'Susu dan produk olahannya memerlukan penanganan dingin yang konsisten agar mutu dan keamanannya terjaga. Kesalahan penyimpanan dapat mempercepat kerusakan dan meningkatkan risiko kontaminasi.',
                'Susu, yoghurt, keju, dan olahan susu lainnya merupakan sumber gizi yang baik, tetapi termasuk pangan yang sensitif terhadap suhu. Produk ini harus disimpan dengan cara yang benar sejak dibeli hingga dikonsumsi.',
                [
                    'Produk susu sebaiknya dipilih dalam kondisi dingin dan langsung dibawa pulang. Setelah itu, simpan segera di kulkas. Hindari menempatkannya terlalu lama di luar pendingin, terutama setelah kemasan dibuka.',
                    'Kontaminasi juga bisa terjadi saat menuang susu menggunakan gelas atau sendok yang tidak bersih. Perubahan bau, rasa, warna, atau tekstur harus menjadi tanda untuk tidak mengonsumsi produk tersebut.',
                ],
                [
                    'Simpan susu dan produk olahannya di suhu dingin yang stabil.',
                    'Tutup rapat kemasan setelah digunakan.',
                    'Gunakan alat saji yang bersih.',
                    'Jangan konsumsi bila terdapat perubahan bau, rasa, atau tekstur.',
                ],
                'Penyimpanan yang baik membantu susu dan produk olahannya tetap aman dan bernilai gizi optimal. Dengan disiplin menjaga suhu dan kebersihan, risiko kerusakan dapat diminimalkan.'
            ),
            $this->makeArticle(
                'Sanitasi Peralatan Masak untuk Mencegah Kontaminasi',
                'sanitasi-peralatan-masak-untuk-mencegah-kontaminasi',
                'Peralatan masak yang tampak bersih belum tentu bebas dari mikroorganisme berbahaya. Sanitasi yang tepat membantu mencegah perpindahan kontaminan ke makanan selama proses pengolahan.',
                'Pisau, talenan, panci, sendok, wadah, dan meja dapur digunakan berulang kali setiap hari. Bila tidak dibersihkan dan disanitasi dengan benar, alat-alat tersebut dapat menjadi sumber kontaminasi yang tidak terlihat.',
                [
                    'Pembersihan bertujuan menghilangkan sisa makanan, lemak, dan kotoran, sedangkan sanitasi bertujuan menurunkan jumlah mikroorganisme ke tingkat yang aman. Kedua proses ini sebaiknya dilakukan berurutan.',
                    'Kain lap dan spons juga perlu diperhatikan. Benda-benda ini mudah menjadi lembap dan menjadi tempat berkembangnya bakteri jika jarang dicuci atau diganti.',
                ],
                [
                    'Cuci alat dengan sabun setelah digunakan dan bilas dengan air bersih.',
                    'Sanitasi alat yang baru dipakai untuk bahan mentah.',
                    'Keringkan peralatan sebelum disimpan.',
                    'Ganti spons atau kain lap secara berkala.',
                ],
                'Sanitasi alat masak adalah bagian penting dari rantai keamanan pangan. Dapur yang bersih bukan hanya terlihat rapi, tetapi juga lebih aman untuk menghasilkan makanan sehat.'
            ),
            $this->makeArticle(
                'Cara Aman Mencairkan Makanan Beku',
                'cara-aman-mencairkan-makanan-beku',
                'Mencairkan makanan beku dengan cara yang salah dapat meningkatkan pertumbuhan mikroorganisme pada permukaannya. Oleh karena itu, proses pencairan harus dilakukan dengan metode yang aman dan terkontrol.',
                'Membekukan makanan membantu memperpanjang umur simpan, tetapi makanan tetap perlu dicairkan dengan benar sebelum diolah. Banyak orang masih mencairkan bahan pangan beku di suhu ruang terlalu lama.',
                [
                    'Cara paling aman adalah memindahkan bahan beku ke kulkas dan membiarkannya mencair perlahan. Metode ini menjaga suhu tetap rendah selama proses pencairan. Alternatif lain adalah menggunakan aliran air dingin atau langsung memasak bahan dari keadaan beku jika memungkinkan.',
                    'Saat makanan dibiarkan mencair di meja dapur, bagian luar bisa masuk ke suhu yang mendukung pertumbuhan bakteri sementara bagian dalam masih membeku. Risiko ini lebih tinggi pada daging, ayam, dan seafood.',
                ],
                [
                    'Cairkan bahan beku di kulkas bila memungkinkan.',
                    'Gunakan air dingin mengalir jika membutuhkan pencairan lebih cepat.',
                    'Jangan mencairkan makanan beku terlalu lama di suhu ruang.',
                    'Masak segera setelah bahan selesai dicairkan.',
                ],
                'Pencairan makanan beku yang aman penting untuk menjaga mutu dan menekan risiko kontaminasi. Pilihan metode yang tepat akan membuat proses memasak menjadi lebih aman.'
            ),
            $this->makeArticle(
                'Pentingnya Air Bersih dalam Keamanan Pangan',
                'pentingnya-air-bersih-dalam-keamanan-pangan',
                'Air bersih berperan penting dalam mencuci bahan, membersihkan alat, membuat minuman, dan memasak makanan. Jika air yang digunakan tidak aman, risiko pencemaran pangan akan meningkat secara signifikan.',
                'Dalam banyak kegiatan dapur, air digunakan hampir di setiap tahap. Karena itulah kualitas air sangat menentukan keamanan pangan, baik di rumah, sekolah, usaha makanan, maupun fasilitas umum.',
                [
                    'Air yang tercemar dapat membawa bakteri, virus, parasit, atau bahan kimia yang berbahaya. Kontaminasi ini bisa berpindah ke sayur, buah, es batu, gelas, alat makan, dan makanan matang.',
                    'Pemakaian air bersih harus mencakup seluruh proses, bukan hanya untuk diminum. Air untuk mencuci tangan, membilas alat, atau membuat es juga perlu diperhatikan.',
                ],
                [
                    'Gunakan sumber air yang sudah dipastikan aman.',
                    'Simpan air dalam wadah tertutup dan bersih.',
                    'Pastikan es dibuat dari air yang layak konsumsi.',
                    'Cuci alat dan bahan makanan dengan air bersih mengalir.',
                ],
                'Air bersih adalah fondasi keamanan pangan yang sering diremehkan. Dengan memastikan kualitas air, kita melindungi makanan sejak tahap paling dasar.'
            ),
            $this->makeArticle(
                'Mengenal Zona Bahaya Suhu Pangan',
                'mengenal-zona-bahaya-suhu-pangan',
                'Zona bahaya suhu pangan adalah rentang suhu yang mendukung pertumbuhan cepat mikroorganisme pada makanan. Memahami konsep ini membantu masyarakat menentukan kapan makanan harus dipanaskan, didinginkan, atau dibuang.',
                'Suhu merupakan faktor penting yang memengaruhi keamanan pangan. Makanan yang dibiarkan dalam rentang suhu tertentu terlalu lama dapat menjadi media pertumbuhan bakteri, meskipun tampilan luarnya masih tampak normal.',
                [
                    'Zona bahaya umumnya berada di antara suhu dingin dan suhu panas yang aman untuk penyimpanan serta penyajian. Makanan matang, lauk berkuah, nasi, dan produk hewani sangat rentan jika dibiarkan terlalu lama dalam rentang ini.',
                    'Konsep zona bahaya suhu membantu kita memahami pentingnya pendinginan cepat, penyajian panas, dan pemanasan ulang yang memadai. Dalam konteks edukasi publik, konsep ini sangat praktis karena mudah diterapkan di rumah tangga maupun usaha makanan kecil.',
                ],
                [
                    'Simpan pangan dingin tetap dingin dan pangan panas tetap panas.',
                    'Jangan biarkan makanan berada terlalu lama di suhu ruang.',
                    'Dinginkan sisa makanan sesegera mungkin setelah makan.',
                    'Panaskan ulang makanan hingga panas merata sebelum disajikan.',
                ],
                'Memahami zona bahaya suhu membantu masyarakat membuat keputusan yang lebih aman saat menyimpan dan menyajikan makanan. Pengendalian suhu adalah salah satu kunci utama keamanan pangan.'
            ),
            $this->makeArticle(
                'Tips Aman Menyiapkan Bekal Sekolah dan Kantor',
                'tips-aman-menyiapkan-bekal-sekolah-dan-kantor',
                'Bekal yang praktis tetap harus disiapkan dengan memperhatikan keamanan pangan agar aman dikonsumsi beberapa jam setelah dibuat. Pemilihan menu, wadah, dan cara penyimpanan sangat menentukan mutu serta keamanannya.',
                'Bekal menjadi solusi yang sehat dan hemat untuk anak sekolah maupun pekerja. Namun, karena bekal sering dibawa dalam perjalanan dan disimpan beberapa waktu sebelum dimakan, risikonya perlu diperhatikan.',
                [
                    'Pilih menu yang relatif stabil dan tidak mudah rusak. Makanan berkuah santan, susu, atau lauk yang sangat basah memerlukan perhatian lebih karena lebih cepat rusak jika tidak didinginkan.',
                    'Jika memungkinkan, gunakan tas atau kotak bekal dengan pendingin untuk makanan yang mudah rusak. Pastikan tangan dan alat yang digunakan saat menyiapkan bekal bersih.',
                ],
                [
                    'Gunakan wadah bersih dan tertutup rapat.',
                    'Pilih menu bekal yang aman disimpan beberapa jam.',
                    'Simpan bekal di tempat sejuk atau gunakan ice pack jika perlu.',
                    'Jangan menyimpan bekal sisa untuk dimakan ulang jika sudah terlalu lama terbuka.',
                ],
                'Bekal yang aman bukan hanya soal gizi, tetapi juga soal cara menyiapkan dan menyimpannya. Perencanaan yang baik akan membuat bekal lebih sehat dan lebih aman dikonsumsi.'
            ),
            $this->makeArticle(
                'Cara Menangani Telur dengan Aman',
                'cara-menangani-telur-dengan-aman',
                'Telur merupakan bahan pangan bergizi yang banyak digunakan di rumah tangga. Meski demikian, telur tetap perlu ditangani dengan aman karena kulitnya dapat membawa kontaminan dan isi telur berisiko bila tidak dimasak dengan baik.',
                'Telur sering digunakan dalam berbagai menu, mulai dari sarapan hingga kue. Karena pemakaiannya sangat umum, pemahaman tentang penanganan telur yang aman penting bagi semua orang.',
                [
                    'Pilih telur yang cangkangnya utuh dan bersih. Simpan di tempat sejuk dan hindari kontak dengan bahan mentah lain yang berisiko. Saat memecahkan telur, usahakan isi telur tidak terkena permukaan yang kotor.',
                    'Untuk kelompok rentan, telur setengah matang sebaiknya dihindari karena dapat meningkatkan risiko penyakit. Memasak telur hingga putih dan kuningnya set sangat membantu menurunkan risiko.',
                ],
                [
                    'Pilih telur dengan cangkang utuh dan tidak retak.',
                    'Cuci tangan setelah memegang telur mentah.',
                    'Masak telur hingga matang sempurna untuk kelompok rentan.',
                    'Simpan telur di tempat sejuk dan terpisah dari makanan siap santap.',
                ],
                'Penanganan telur yang aman membantu mempertahankan manfaat gizinya sekaligus menurunkan risiko kontaminasi. Langkah kecil di dapur dapat memberi perlindungan besar bagi kesehatan.'
            ),
            $this->makeArticle(
                'Menyusun Kulkas agar Pangan Tetap Aman',
                'menyusun-kulkas-agar-pangan-tetap-aman',
                'Penyusunan bahan pangan di dalam kulkas berpengaruh pada keamanan dan kualitas makanan. Tata letak yang benar membantu mencegah tetesan bahan mentah, menjaga suhu stabil, dan memudahkan pemantauan stok pangan.',
                'Banyak kulkas rumah tangga dipenuhi bahan makanan tanpa pengaturan yang jelas. Akibatnya, ada risiko bahan mentah bocor ke makanan siap santap, dan udara dingin tidak bersirkulasi dengan baik.',
                [
                    'Aturan dasarnya adalah menempatkan bahan mentah seperti daging, ayam, atau ikan di rak bawah dalam wadah tertutup. Makanan matang, sisa makanan, produk susu, dan buah siap santap sebaiknya disimpan di rak yang lebih aman dari tetesan.',
                    'Kulkas yang terlalu penuh membuat aliran udara dingin terhambat. Menyusun kulkas secara teratur membantu keluarga menggunakan bahan lebih cepat, mengurangi pemborosan, dan menjaga keamanan pangan sehari-hari.',
                ],
                [
                    'Letakkan bahan mentah di rak bawah dalam wadah tertutup.',
                    'Simpan makanan matang dan siap santap di rak tengah atau atas.',
                    'Jangan memenuhi kulkas secara berlebihan.',
                    'Bersihkan tumpahan segera agar tidak mencemari bahan lain.',
                ],
                'Kulkas yang tertata dengan baik mendukung keamanan pangan di rumah. Penempatan bahan yang tepat membuat penyimpanan menjadi lebih aman, efisien, dan mudah dipantau.'
            ),
            $this->makeArticle(
                'Tanda-Tanda Pangan Tidak Layak Konsumsi',
                'tanda-tanda-pangan-tidak-layak-konsumsi',
                'Beberapa perubahan pada pangan dapat menjadi petunjuk bahwa makanan sudah menurun mutunya atau tidak lagi aman dikonsumsi. Masyarakat perlu memahami tanda-tanda ini agar dapat mengambil keputusan dengan lebih bijak.',
                'Tidak semua pangan berbahaya menunjukkan perubahan yang jelas, tetapi banyak produk memang memperlihatkan tanda-tanda kerusakan yang dapat diamati. Pengetahuan ini penting untuk mencegah konsumsi makanan yang tidak layak.',
                [
                    'Perubahan bau, warna, tekstur, dan rasa dapat menjadi sinyal bahwa makanan telah rusak. Pada pangan kemasan, kondisi seperti kemasan menggembung, bocor, atau berkarat juga perlu diwaspadai.',
                    'Walau demikian, beberapa makanan berbahaya bisa tetap tampak normal. Karena itu, penilaian keamanan pangan sebaiknya tidak hanya bergantung pada indra, tetapi juga pada riwayat penyimpanan dan kebersihan proses.',
                ],
                [
                    'Periksa bau, warna, tekstur, dan kondisi kemasan sebelum mengonsumsi.',
                    'Hindari produk dengan kemasan bocor, menggembung, atau rusak.',
                    'Jangan mengandalkan bau saja untuk menilai keamanan makanan.',
                    'Buang makanan yang diragukan keamanannya daripada mengambil risiko.',
                ],
                'Mengenali tanda pangan tidak layak konsumsi membantu masyarakat membuat keputusan yang lebih aman. Kewaspadaan sederhana ini dapat mencegah masalah kesehatan yang serius.'
            ),
            $this->makeArticle(
                'Mengurangi Risiko Kontaminasi saat Belanja Bahan Pangan',
                'mengurangi-risiko-kontaminasi-saat-belanja-bahan-pangan',
                'Keamanan pangan dimulai sejak bahan dipilih di pasar atau supermarket. Cara memilih, memisahkan, dan membawa bahan pangan pulang dapat memengaruhi risiko kontaminasi sebelum proses memasak dimulai.',
                'Belanja bahan pangan sering dianggap kegiatan biasa, padahal tahap ini menentukan kualitas awal makanan yang akan dikonsumsi. Bahan yang dipilih dengan kurang hati-hati dapat membawa risiko ke dapur rumah.',
                [
                    'Pisahkan bahan mentah seperti daging, ayam, dan seafood dari bahan siap makan seperti roti, buah, atau makanan matang. Gunakan kantong berbeda agar cairan dari bahan mentah tidak menetes ke bahan lain selama perjalanan pulang.',
                    'Pilih bahan yang masih segar, tidak rusak, dan disimpan pada kondisi yang sesuai. Produk dingin sebaiknya dibeli di akhir sesi belanja agar waktu di luar pendingin lebih singkat.',
                ],
                [
                    'Pisahkan bahan mentah dan makanan siap makan saat berbelanja.',
                    'Periksa kesegaran, suhu, dan kondisi kemasan produk.',
                    'Beli produk dingin atau beku menjelang akhir belanja.',
                    'Segera simpan bahan pangan setelah tiba di rumah.',
                ],
                'Belanja yang cermat adalah langkah awal menuju dapur yang aman. Dengan memperhatikan cara memilih dan membawa bahan pangan, risiko kontaminasi dapat dikurangi sejak awal.'
            ),
            $this->makeArticle(
                'Prinsip FIFO di Dapur Rumah Tangga',
                'prinsip-fifo-di-dapur-rumah-tangga',
                'Prinsip FIFO atau first in first out membantu memastikan bahan pangan yang lebih dulu dibeli digunakan lebih dulu. Cara ini mendukung efisiensi dapur sekaligus mengurangi risiko makanan terbuang atau rusak.',
                'Banyak keluarga membeli bahan makanan secara rutin, tetapi tidak selalu memantau stok yang sudah ada. Akibatnya, bahan lama tertinggal di belakang dan baru ditemukan saat kondisinya sudah menurun.',
                [
                    'Dengan prinsip FIFO, bahan yang lebih lama ditempatkan di bagian depan agar mudah dipakai lebih dulu. Bahan yang baru dibeli diletakkan di belakang. Kebiasaan ini membantu mencegah penumpukan dan memudahkan rotasi stok.',
                    'Prinsip ini tidak hanya berlaku untuk bahan kering, tetapi juga untuk produk kulkas dan freezer. Label tanggal pembelian atau tanggal buka kemasan sangat membantu keluarga menerapkan FIFO secara konsisten.',
                ],
                [
                    'Letakkan bahan yang lebih dulu dibeli di bagian depan rak atau kulkas.',
                    'Tambahkan label tanggal pada wadah atau kemasan.',
                    'Periksa stok secara berkala sebelum berbelanja lagi.',
                    'Gunakan bahan yang masa simpannya lebih pendek terlebih dahulu.',
                ],
                'FIFO adalah prinsip sederhana yang sangat berguna untuk dapur rumah tangga. Selain menghemat biaya, cara ini juga membantu menjaga keamanan dan kualitas pangan yang dikonsumsi.'
            ),
            $this->makeArticle(
                'Melindungi Kelompok Rentan dari Penyakit Bawaan Makanan',
                'melindungi-kelompok-rentan-dari-penyakit-bawaan-makanan',
                'Beberapa kelompok memiliki risiko lebih tinggi mengalami komplikasi akibat penyakit bawaan makanan, seperti balita, lansia, ibu hamil, dan orang dengan imunitas rendah. Perlindungan bagi kelompok ini membutuhkan perhatian lebih pada pilihan dan penanganan makanan.',
                'Tidak semua orang memiliki tingkat ketahanan tubuh yang sama. Makanan yang mungkin hanya menimbulkan gejala ringan pada orang sehat bisa berdampak lebih berat pada kelompok rentan.',
                [
                    'Untuk kelompok rentan, makanan mentah atau setengah matang sebaiknya dihindari. Produk susu yang tidak terpasteurisasi, telur setengah matang, serta daging dan seafood yang kurang matang memiliki risiko lebih tinggi.',
                    'Penyimpanan makanan bagi kelompok rentan juga sebaiknya lebih konservatif. Sisa makanan jangan disimpan terlalu lama dan makanan yang diragukan keamanannya sebaiknya tidak diberikan.',
                ],
                [
                    'Sajikan makanan yang dimasak matang sempurna.',
                    'Hindari produk mentah atau yang belum dipasteurisasi untuk kelompok rentan.',
                    'Gunakan bahan segar dan simpan dengan benar.',
                    'Buang makanan yang diragukan daripada mengambil risiko.',
                ],
                'Melindungi kelompok rentan berarti memberi perhatian lebih pada keamanan pangan sehari-hari. Langkah pencegahan yang tepat dapat mencegah dampak kesehatan yang lebih serius.'
            ),
            $this->makeArticle(
                'Cara Aman Mengolah Seafood di Rumah',
                'cara-aman-mengolah-seafood-di-rumah',
                'Seafood seperti ikan, udang, cumi, dan kerang memiliki nilai gizi yang baik, tetapi perlu ditangani dengan hati-hati karena mudah rusak. Pengelolaan suhu, kebersihan, dan kematangan menjadi aspek penting dalam pengolahan seafood.',
                'Seafood sangat populer dalam banyak masakan, namun juga termasuk pangan yang sensitif terhadap suhu. Jika dibiarkan terlalu lama tanpa pendinginan, mutunya cepat turun dan risiko kontaminasi meningkat.',
                [
                    'Saat membeli, pilih seafood yang segar, tidak berbau tajam, dan masih disimpan dingin. Setelah sampai di rumah, segera simpan dalam kulkas atau freezer. Saat membersihkan, gunakan air bersih dan alat yang terpisah dari bahan siap makan.',
                    'Seafood harus dimasak hingga tingkat kematangan yang aman. Untuk kerang-kerangan, pastikan produk terbuka saat dimasak dan hindari konsumsi yang kondisinya meragukan.',
                ],
                [
                    'Pilih seafood yang segar dan berasal dari sumber yang bersih.',
                    'Simpan segera pada suhu dingin setelah dibeli.',
                    'Gunakan alat terpisah untuk membersihkan seafood mentah.',
                    'Masak hingga matang sempurna sebelum disajikan.',
                ],
                'Seafood dapat menjadi bagian dari pola makan sehat bila diolah dengan benar. Pengendalian suhu dan kebersihan menjadi kunci utama untuk menjaga keamanannya.'
            ),
            $this->makeArticle(
                'Mengelola Sampah Dapur untuk Menjaga Kebersihan Pangan',
                'mengelola-sampah-dapur-untuk-menjaga-kebersihan-pangan',
                'Sampah dapur yang tidak dikelola dengan baik dapat menarik hama, menimbulkan bau, dan meningkatkan risiko kontaminasi makanan. Pengelolaan sampah yang higienis mendukung lingkungan dapur yang lebih aman dan nyaman.',
                'Kulit buah, sisa sayur, kemasan bekas, dan potongan bahan mentah adalah bagian biasa dari aktivitas memasak. Namun jika sampah menumpuk terlalu lama di area dapur, kebersihan pangan dapat terganggu.',
                [
                    'Wadah sampah sebaiknya memiliki penutup dan mudah dibersihkan. Sampah organik yang basah sebaiknya dibuang lebih cepat agar tidak menjadi sumber bau dan serangga. Setelah membuang sampah, tangan perlu dicuci sebelum kembali menyentuh makanan.',
                    'Area sekitar tempat sampah juga perlu dijaga kebersihannya. Cairan yang menetes atau serpihan makanan di lantai dapat menarik hama dan mencemari lingkungan dapur.',
                ],
                [
                    'Gunakan tempat sampah tertutup di area dapur.',
                    'Buang sampah basah secara teratur agar tidak menumpuk.',
                    'Cuci tangan setelah membuang sampah.',
                    'Bersihkan wadah sampah dan area sekitarnya secara rutin.',
                ],
                'Pengelolaan sampah dapur yang baik membantu menjaga kebersihan lingkungan masak. Dapur yang bersih dari sampah adalah langkah penting untuk menghasilkan pangan yang lebih aman.'
            ),
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['slug' => $article['slug']],
                [
                    'title' => $article['title'],
                    'content' => $article['content'],
                    'image' => null,
                    'is_published' => true,
                ]
            );
        }
    }

    private function makeArticle(
        string $title,
        string $slug,
        string $description,
        string $introduction,
        array $mainParagraphs,
        array $tips,
        string $conclusion
    ): array {
        $tipsText = implode("\n", array_map(static fn (string $tip) => '- ' . $tip, $tips));

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => implode("\n\n", [
                'Ringkasan',
                $description,
                'Pendahuluan',
                $introduction,
                'Pembahasan',
                ...$mainParagraphs,
                'Tips Keamanan Pangan',
                $tipsText,
                'Kesimpulan',
                $conclusion,
            ]),
        ];
    }
}
