<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        // Dummy data for doctors list
        $doctors = [
            [
                'id' => 1,
                'name' => 'Dr. Lisa',
                'title' => 'Dokter Estetika',
                'image' => asset('img/doctor.png'),
            ],
        ];

        return view('doctors', compact('doctors'));
    }

    public function show()
    {
        // Data dokter sesuai desain baru
        $doctor = [
            'id' => 1,
            'name' => 'Dr. Eka Dwi Wulan',
            'subtitle' => 'Dokter kecantikan bersertifikat dan berpengalaman',
            'image' => asset('img/doctor.png'),
            'education' => [
                'Dokter Umum – Universitas Indonesia',
                'Sertifikasi Estetika Medik – Lembaga Estetika Indonesia',
                'Pelatihan Advanced Aesthetic & Anti-Aging – DermaPro Academy, Jakarta',
            ],
            'experience' => [
                [
                    'position' => 'Dokter Estetika',
                    'company' => 'Mahyra Aesthetic Clinic',
                    'period' => '2020 – Sekarang',
                    'description' => 'Melakukan prosedur estetika seperti filler, botox, laser, dan perawatan wajah.',
                ],
                [
                    'position' => 'Medical Consultant',
                    'company' => 'Glow Derma Center',
                    'period' => '2018 – 2020',
                    'description' => 'Memberikan konsultasi estetika dan rekomendasi perawatan hasil analisis kulit pasien.',
                ],
            ],
            'awards' => [
                'Pelatihan Filler & Botox – Allergan Medical Institute',
                'Laser Aesthetic Certification – SkinPro Academy',
                'Workshop Anti Aging – DermaPro International',
            ],
        ];

        return view('doctor-detail', compact('doctor'));
    }
}

