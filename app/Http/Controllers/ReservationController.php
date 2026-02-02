<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Treatment data
     */
    private $treatments = [
        1 => ['title' => 'Mencerahkan Wajah', 'price' => 350000, 'duration' => '75 Menit', 'icon' => 'face'],
        2 => ['title' => 'Perawatan Jerawat', 'price' => 300000, 'duration' => '60 Menit', 'icon' => 'acne'],
        3 => ['title' => 'Perawatan Anti Penuaan', 'price' => 500000, 'duration' => '90 Menit', 'icon' => 'anti-aging'],
        4 => ['title' => 'Injeksi Botox', 'price' => 850000, 'duration' => '45 Menit', 'icon' => 'syringe'],
        5 => ['title' => 'Perawatan Filler', 'price' => 950000, 'duration' => '60 Menit', 'icon' => 'syringe'],
        6 => ['title' => 'Pencerah Badan', 'price' => 450000, 'duration' => '120 Menit', 'icon' => 'body'],
        7 => ['title' => 'Masker Wajah', 'price' => 100000, 'duration' => '30 Menit', 'icon' => 'mask'],
        8 => ['title' => 'Perawatan Komedo', 'price' => 100000, 'duration' => '45 Menit', 'icon' => 'komedo'],
    ];

    public function create(Request $request)
    {
        // Format treatments for view
        $treatments = [];
        foreach ($this->treatments as $id => $treatment) {
            $treatments[] = [
                'id' => $id,
                'title' => $treatment['title'],
                'price' => 'Rp ' . number_format($treatment['price'], 0, ',', '.'),
                'icon' => $treatment['icon'],
            ];
        }

        // Available time slots
        $timeSlots = ['09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00', '17:00'];

        return view('reservation', compact('treatments', 'timeSlots'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'treatment_id' => ['required', 'integer'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
        ]);

        $treatmentId = (int) $validated['treatment_id'];
        $treatment = $this->treatments[$treatmentId] ?? null;

        if (!$treatment) {
            return back()->withErrors(['treatment_id' => 'Perawatan tidak valid.']);
        }

        // Save reservation to database
        $reservasi = Reservasi::create([
            'id_pengguna' => Auth::id(),
            'nama_perawatan' => $treatment['title'],
            'harga' => $treatment['price'],
            'tanggal' => $validated['date'],
            'waktu' => $validated['time'],
            'status' => 'menunggu',
            'nama_pelanggan' => $validated['name'],
            'email_pelanggan' => $validated['email'],
            'telepon_pelanggan' => $validated['phone'],
        ]);

        // Store reservation data in session for success page
        session([
            'reservation' => [
                'id' => $reservasi->id,
                'treatment' => $treatment['title'],
                'price' => 'Rp ' . number_format($treatment['price'], 0, ',', '.'),
                'duration' => $treatment['duration'],
                'date' => $validated['date'],
                'time' => $validated['time'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
            ]
        ]);

        return redirect()->route('reservasi.success');
    }

    public function success()
    {
        if (!session('reservation')) {
            return redirect()->route('services');
        }

        return view('reservation-success');
    }
}
