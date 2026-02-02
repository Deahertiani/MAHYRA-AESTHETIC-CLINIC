<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    /**
     * Template bot responses based on keywords
     */
    private $botResponses = [
        'halo' => 'Halo! Selamat datang di MAHYRA Aesthetic Clinic. Ada yang bisa kami bantu?',
        'perawatan' => 'Kami menyediakan berbagai layanan perawatan wajah seperti facial, chemical peeling, dan treatment anti-aging. Bisa ceritakan lebih detail kondisi kulit Anda?',
        'wajah' => 'Untuk perawatan wajah, kami memiliki facial treatment, laser treatment, dan botox. Mana yang Anda minati?',
        'harga' => 'Untuk informasi harga, silakan kunjungi halaman Layanan kami atau hubungi kami langsung. Harga bervariasi tergantung jenis treatment.',
        'jerawat' => 'Untuk masalah jerawat, kami menyarankan facial deep cleansing dan chemical peeling. Apakah Anda ingin membuat reservasi konsultasi dengan dokter kami?',
        'berminyak' => 'Kulit berminyak dapat ditangani dengan facial oil control dan treatment pore minimizer. Kami juga menyediakan skincare recommendation.',
        'kering' => 'Untuk kulit kering, kami menyarankan hydrating facial dan moisturizing treatment. Apakah Anda ingin mencoba treatment kami?',
        'reservasi' => 'Anda dapat membuat reservasi melalui halaman Reservasi di website kami. Apakah ada hal lain yang ingin ditanyakan?',
        'dokter' => 'Dokter kami, Dr. Eka Dwi Wulan, adalah dokter estetika bersertifikat dengan pengalaman di berbagai klinik ternama. Beliau siap membantu masalah kulit Anda!',
        'terima kasih' => 'Sama-sama! Jika ada pertanyaan lain, jangan ragu untuk menghubungi kami. Semoga harimu menyenangkan! ✨',
        'default' => 'Terima kasih atas pertanyaannya! Tim kami akan segera merespons. Untuk konsultasi lebih lanjut, silakan membuat reservasi dengan dokter kami.',
    ];

    public function index()
    {
        $messages = [];

        if (Auth::check()) {
            // Get user's messages from database
            $konsultasis = Konsultasi::where('id_pengguna', Auth::id())
                ->orderBy('created_at', 'asc')
                ->get();

            foreach ($konsultasis as $konsultasi) {
                $messages[] = [
                    'id' => $konsultasi->id,
                    'sender' => $konsultasi->pengirim,
                    'message' => $konsultasi->pesan,
                    'time' => $konsultasi->created_at->format('H:i'),
                ];
            }

            // If no messages, add welcome message
            if (empty($messages)) {
                // Add welcome message to database
                $welcome = Konsultasi::create([
                    'id_pengguna' => Auth::id(),
                    'pengirim' => 'bot',
                    'pesan' => 'Halo! Selamat datang di MAHYRA Aesthetic Clinic. Ada yang bisa kami bantu?',
                ]);

                $messages[] = [
                    'id' => $welcome->id,
                    'sender' => 'bot',
                    'message' => $welcome->pesan,
                    'time' => $welcome->created_at->format('H:i'),
                ];
            }
        } else {
            // Default welcome message for guests
            $messages[] = [
                'id' => 1,
                'sender' => 'bot',
                'message' => 'Halo! Selamat datang di MAHYRA Aesthetic Clinic. Silakan login untuk memulai konsultasi.',
                'time' => now()->format('H:i'),
            ];
        }

        return view('consultation', compact('messages'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'message' => ['required', 'string', 'max:1000'],
        ]);

        // Save user message
        Konsultasi::create([
            'id_pengguna' => Auth::id(),
            'pengirim' => 'user',
            'pesan' => $validated['message'],
        ]);

        // Generate bot response based on keywords
        $botReply = $this->getBotResponse($validated['message']);

        // Save bot response
        Konsultasi::create([
            'id_pengguna' => Auth::id(),
            'pengirim' => 'bot',
            'pesan' => $botReply,
        ]);

        return redirect()->route('consultation');
    }

    /**
     * Get bot response based on message keywords
     */
    private function getBotResponse(string $message): string
    {
        $message = strtolower($message);

        foreach ($this->botResponses as $keyword => $response) {
            if ($keyword !== 'default' && str_contains($message, $keyword)) {
                return $response;
            }
        }

        return $this->botResponses['default'];
    }
}
