<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Data simulasi (nanti bisa diambil dari Database)
        $serviceCategories = [
            [
                'id' => 'wajah',
                'title' => 'Perawatan Wajah',
                'icon' => 'face'
            ],
            [
                'id' => 'anti-aging',
                'title' => 'Solusi Anti Penuaan',
                'icon' => 'anti-aging'
            ],
            [
                'id' => 'injection',
                'title' => 'Injeksi Perawatan anti-aging',
                'icon' => 'injection'
            ],
            [
                'id' => 'badan',
                'title' => 'Perawatan badan',
                'icon' => 'body'
            ],
        ];

        $services = [
            [
                'id' => 'wajah',
                'title' => 'Perawatan wajah untuk menutrisi dan meremajakan',
                'desc' => 'Perawatan wajah adalah metode untuk memelihara kesehatan kulit dan mencegah maupun mengatasi berbagai masalah kulit wajah',
                'points' => ['Pembersihan Mendalam', 'Pengelupasan kulit', 'Meningkatkan sirkulasi', 'Hidrasi'],
                'image' => asset('img/service-face.png')
            ],
            [
                'id' => 'anti-aging',
                'title' => 'Solusi Anti Penuaan',
                'desc' => 'Kembalikan elastisitas kulit dengan serum premium kami.',
                'points' => ['Mengurangi Kerutan', 'Mengencangkan Kulit', 'Vitamin E Boost'],
                'image' => asset('img/service-face.png')
            ],
            [
                'id' => 'injection',
                'title' => 'Injeksi Perawatan anti-aging',
                'desc' => 'Perawatan injeksi untuk mengatasi tanda-tanda penuaan.',
                'points' => ['Botox', 'Filler', 'Vitamin C Injection'],
                'image' => asset('img/service-face.png')
            ],
            [
                'id' => 'badan',
                'title' => 'Perawatan badan',
                'desc' => 'Perawatan lengkap untuk seluruh tubuh Anda.',
                'points' => ['Body Scrub', 'Body Massage', 'Body Wrap'],
                'image' => asset('img/service-face.png')
            ],
        ];

        $testimonials = [
            [
                'name' => 'Putri Sundari',
                'text' => 'Pelayanan sangat profesional dan hasil perawatan sangat memuaskan!',
                'stars' => 5
            ],
            [
                'name' => 'Desce Nabila Putr',
                'text' => 'Pelayanan sangat profesional dan hasil perawatan sangat memuaskan!',
                'stars' => 5
            ],
            [
                'name' => 'Julia Dina',
                'text' => 'Mahyra Aestetic Clinic adalah tempat terbaik untuk perawatan kecantikan.',
                'stars' => 5
            ]
        ];

        $features = [
            [
                'title' => 'Dokter Profesional',
                'desc' => 'Dokter kecantikan bersertifikat dan berpengalaman.',
                'icon' => 'star'
            ],
            [
                'title' => 'Aman & Terpercaya',
                'desc' => 'Menggunakan produk dan teknologi terkini yang teruji',
                'icon' => 'shield'
            ],
            [
                'title' => 'Reservasi Mudah',
                'desc' => 'Reservasi online kapan saja di mana saja dengan mudah',
                'icon' => 'calendar'
            ],
        ];

        $promotions = [
            [
                'title' => 'Diskon 50% untuk perawatan wajah pertama',
                'desc' => 'Rasakan perawatan wajah andalan kami dan nikmati diskon 50% untuk kunjungan pertama anda. Dapatkan kulit bercahaya dan segar hari ini juga!',
                'button' => 'Reservasi Sekarang'
            ],
            [
                'title' => 'Serum pencerah untuk kulit bercahaya dan bersinar',
                'desc' => 'Dapatkan serum pencerah premium dengan harga spesial untuk periode terbatas.',
                'button' => 'Reservasi Sekarang'
            ],
        ];

        return view('welcome', compact('serviceCategories', 'services', 'testimonials', 'features', 'promotions'));
    }
}