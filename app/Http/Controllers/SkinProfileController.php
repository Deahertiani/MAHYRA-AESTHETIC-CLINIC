<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkinProfileController extends Controller
{
    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        return view('skin-profile', compact('user'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'skin_type' => ['required', 'string', 'in:kering,normal,berminyak,kombinasi,berjerawat'],
            'skin_color' => ['required', 'string', 'in:terang,sedang,gelap'],
            'skin_problem' => ['required', 'string', 'in:bekas_jerawat,komedo,mata_panda,kulit_kusam,hiperpigmentasi,kulit_kasar,pori_besar,kulit_sensitif,keriput'],
        ], [
            'skin_problem.required' => 'Pilih satu masalah kulit.',
        ]);

        $user = Auth::user();

        // Save skin profile data to database using Indonesian column names
        $user->jenis_kulit = $validated['skin_type'];
        $user->warna_kulit = $validated['skin_color'];
        $user->masalah_kulit = $validated['skin_problem'];
        $user->save();

        return redirect()->route('profile')->with('success', 'Profil kulit Anda berhasil disimpan!');
    }
}


