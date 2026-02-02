<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        // Dummy FAQ data
        $faqs = [
            [
                'id' => 1,
                'question' => 'Bagaimana Cara Melakukan Reservasi?',
                'answer' => 'Anda dapat melakukan reservasi melalui halaman Reservasi di website kami. Pilih Perawatan yang diinginkan, tentukan jadwal. Setelah konfirmasi, Anda bisa melihat riwayat reservasi.',
                'expanded' => true,
            ],
            [
                'id' => 2,
                'question' => 'Berapa Lama Hasil Perawatan Terlihat?',
                'answer' => 'Hasil perawatan dapat terlihat dalam waktu 1-2 minggu setelah perawatan dilakukan, tergantung jenis perawatan yang dipilih. Untuk hasil optimal, disarankan melakukan perawatan secara rutin sesuai rekomendasi dokter.',
                'expanded' => false,
            ],
            [
                'id' => 3,
                'question' => 'Apakah perlu konsultasi dulu sebelum memilih perawatan?',
                'answer' => 'Konsultasi sangat disarankan sebelum memilih perawatan. Dengan konsultasi, dokter dapat menganalisis kondisi kulit Anda dan memberikan rekomendasi perawatan yang paling sesuai dengan kebutuhan Anda.',
                'expanded' => false,
            ],
            [
                'id' => 4,
                'question' => 'Apakah ada efek samping setelah perawatan dilakukan?',
                'answer' => 'Efek samping yang mungkin terjadi biasanya ringan dan bersifat sementara, seperti kemerahan atau sedikit bengkak pada area yang dirawat. Efek ini biasanya hilang dalam beberapa jam hingga 1-2 hari. Tim kami akan memberikan panduan perawatan pasca-treatment untuk meminimalisir efek samping.',
                'expanded' => false,
            ],
            [
                'id' => 5,
                'question' => 'Apa yang harus dihindari setelah melakukan perawatan wajah?',
                'answer' => 'Setelah perawatan wajah, hindari paparan sinar matahari langsung, penggunaan make-up selama 24 jam pertama, aktivitas yang menyebabkan keringat berlebih, dan produk skincare yang mengandung AHA/BHA atau retinol selama 3-5 hari. Ikuti instruksi dokter untuk hasil optimal.',
                'expanded' => false,
            ],
            [
                'id' => 6,
                'question' => 'Pertanyaan Lainnya',
                'answer' => 'Jika Anda memiliki pertanyaan lain yang belum terjawab, silakan hubungi kami melalui halaman Konsultasi atau hubungi langsung di nomor (+62) 811-756-926. Tim kami siap membantu menjawab semua pertanyaan Anda.',
                'expanded' => false,
            ],
        ];

        return view('faq', compact('faqs'));
    }
}

