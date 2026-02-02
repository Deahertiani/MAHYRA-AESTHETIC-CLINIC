<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationHistoryController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get user's reservations from database
        $reservations = Reservasi::where('id_pengguna', Auth::id())
            ->orderBy('tanggal', 'desc')
            ->orderBy('waktu', 'desc')
            ->get()
            ->map(function ($reservasi) {
                return [
                    'id' => $reservasi->id,
                    'treatment' => $reservasi->nama_perawatan,
                    'date' => $reservasi->tanggal->format('d/m/Y'),
                    'time' => $reservasi->waktu,
                    'status' => $reservasi->status_display,
                    'status_color' => $reservasi->status_color,
                    'price' => $reservasi->formatted_price,
                    'can_cancel' => $reservasi->can_cancel,
                ];
            });

        return view('reservation-history', compact('reservations'));
    }

    public function cancel($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $reservasi = Reservasi::where('id', $id)
            ->where('id_pengguna', Auth::id())
            ->first();

        if (!$reservasi) {
            return redirect()->route('reservation-history')->with('error', 'Reservasi tidak ditemukan.');
        }

        if (!$reservasi->can_cancel) {
            return redirect()->route('reservation-history')->with('error', 'Reservasi tidak dapat dibatalkan.');
        }

        $reservasi->update(['status' => 'dibatalkan']);

        return redirect()->route('reservation-history')->with('success', 'Reservasi berhasil dibatalkan.');
    }
}
