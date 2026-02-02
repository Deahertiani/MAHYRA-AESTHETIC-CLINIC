<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private function getServices()
    {
        return [
            [
                'id' => 1,
                'title' => 'Mencerahkan Wajah',
                'category' => 'Wajah',
                'description' => 'Perawatan untuk mencerahkan kulit wajah dan mengurangi noda hitam',
                'description_long' => 'Perawatan mencerahkan wajah adalah serangkaian tindakan atau penggunaan produk perawatan kulit (skincare) yang bertujuan untuk meratakan warna kulit, mengurangi kusam, dan menyamarkan noda hitam sehingga kulit tampak lebih sehat, segar, dan bercahaya. Penting untuk dicatat bahwa mencerahkan (brightening) berbeda dengan memutihkan (whitening). Mencerahkan fokus pada mengembalikan rona alami kulit yang sehat, bukan mengubah warna kulit asli seseorang.',
                'benefits' => [
                    'Mencerahkan warna kulit wajah secara merata',
                    'Mengurangi noda hitam dan bekas jerawat',
                    'Mengembalikan kelembapan alami kulit',
                    'Menjadikan kulit tampak lebih halus dan bercahaya',
                ],
                'price' => 'Rp 350.000',
                'duration' => '75 menit',
                'image' => asset('img/service-face.png'),
            ],
            [
                'id' => 2,
                'title' => 'Perawatan Kulit Jerawat',
                'category' => 'Wajah',
                'description' => 'Perawatan jerawat dengan teknologi terkini untuk kulit bersih dan sehat',
                'description_long' => 'Perawatan kulit jerawat adalah serangkaian tindakan medis dan perawatan kulit yang dirancang khusus untuk mengatasi masalah jerawat. Perawatan ini menggunakan teknologi terkini dan bahan-bahan aktif yang efektif untuk membersihkan pori-pori, mengurangi peradangan, dan mencegah timbulnya jerawat baru. Cocok untuk berbagai jenis kulit berjerawat, dari ringan hingga sedang.',
                'benefits' => [
                    'Membersihkan pori-pori secara mendalam',
                    'Mengurangi peradangan dan kemerahan',
                    'Mencegah timbulnya jerawat baru',
                    'Menyamarkan bekas jerawat',
                ],
                'price' => 'Rp 300.000',
                'duration' => '60 menit',
                'image' => asset('img/service-face.png'),
            ],
            [
                'id' => 3,
                'title' => 'Perawatan Anti Penuaan',
                'category' => 'Peremajaan wajah',
                'description' => 'Perawatan Anti Penuaan untuk kulit tampak lebih muda dan kencang',
                'description_long' => 'Perawatan anti penuaan adalah serangkaian prosedur estetika yang dirancang untuk memperlambat tanda-tanda penuaan pada kulit. Menggunakan bahan aktif seperti retinol, vitamin C, dan peptida, perawatan ini membantu merangsang produksi kolagen alami kulit, mengurangi kerutan halus, dan meningkatkan elastisitas kulit untuk penampilan yang lebih muda dan segar.',
                'benefits' => [
                    'Mengurangi garis halus dan kerutan',
                    'Meningkatkan elastisitas kulit',
                    'Merangsang produksi kolagen',
                    'Menjadikan kulit tampak lebih muda dan kencang',
                ],
                'price' => 'Rp 500.000',
                'duration' => '90 menit',
                'image' => asset('img/service-face.png'),
            ],
            [
                'id' => 4,
                'title' => 'Injeksi Botox',
                'category' => 'Injeksi',
                'description' => 'Injeksi botox untuk mengurangi kerutan dan garis halus wajah',
                'description_long' => 'Injeksi Botox adalah prosedur estetika non-bedah yang menggunakan toksin botulinum untuk merelaksasi otot-otot wajah yang menyebabkan kerutan. Prosedur ini sangat efektif untuk mengurangi kerutan pada dahi, garis kerutan di antara alis, dan kerutan di sekitar mata (crow\'s feet). Hasil dapat bertahan 3-6 bulan dengan perawatan yang tepat.',
                'benefits' => [
                    'Mengurangi kerutan dan garis halus',
                    'Hasil cepat terlihat dalam 3-7 hari',
                    'Prosedur cepat dan minim rasa sakit',
                    'Efek bertahan 3-6 bulan',
                ],
                'price' => 'Rp 850.000',
                'duration' => '45 menit',
                'image' => asset('img/service-face.png'),
            ],
            [
                'id' => 5,
                'title' => 'Perawatan Filler',
                'category' => 'Injeksi',
                'description' => 'Perawatan filler untuk meningkatkan volume dan kontur wajah',
                'description_long' => 'Perawatan filler menggunakan bahan hyaluronic acid yang disuntikkan ke area tertentu pada wajah untuk meningkatkan volume, memperbaiki kontur, dan menyamarkan garis-garis penuaan. Filler dapat digunakan untuk bibir, pipi, rahang, dan area lainnya untuk menciptakan tampilan wajah yang lebih berisi dan proporsional.',
                'benefits' => [
                    'Meningkatkan volume pada area wajah',
                    'Memperbaiki kontur wajah',
                    'Menyamarkan garis-garis penuaan',
                    'Hasil instan dan natural',
                ],
                'price' => 'Rp 950.000',
                'duration' => '60 menit',
                'image' => asset('img/service-face.png'),
            ],
            [
                'id' => 6,
                'title' => 'Pencerahan Badan',
                'category' => 'Badan',
                'description' => 'Perawatan pencerah badan untuk kulit lebih cerah merata',
                'description_long' => 'Perawatan pencerahan badan adalah treatment khusus untuk mencerahkan kulit tubuh secara merata. Menggunakan bahan-bahan aktif pencerah seperti vitamin C, arbutin, dan niacinamide, perawatan ini membantu mengurangi hiperpigmentasi, menyamarkan bekas luka, dan memberikan kilau sehat pada kulit tubuh Anda.',
                'benefits' => [
                    'Mencerahkan kulit tubuh secara merata',
                    'Mengurangi hiperpigmentasi',
                    'Menyamarkan bekas luka dan stretch mark',
                    'Memberikan kilau sehat pada kulit',
                ],
                'price' => 'Rp 450.000',
                'duration' => '120 menit',
                'image' => asset('img/service-face.png'),
            ],
        ];
    }

    public function index()
    {
        $services = $this->getServices();
        return view('services', compact('services'));
    }

    public function show($id)
    {
        $services = $this->getServices();
        $service = collect($services)->firstWhere('id', (int) $id);

        if (!$service) {
            abort(404);
        }

        // Available time slots
        $timeSlots = ['09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00', '17:00'];

        return view('service-detail', compact('service', 'timeSlots'));
    }
}

