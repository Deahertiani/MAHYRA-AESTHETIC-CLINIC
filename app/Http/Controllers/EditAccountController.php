<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditAccountController extends Controller
{
    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = User::findOrFail(Auth::id()); // ambil sebagai Eloquent Model
        return view('edit-account', compact('user'));
    }

    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = User::findOrFail(Auth::id()); // ambil sebagai Eloquent Model

        $validated = $request->validate([
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name'  => ['nullable', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:pengguna,email,' . $user->id],
            'gender'     => ['nullable', 'in:Laki-laki,Perempuan'],
            'phone'      => ['nullable', 'string', 'max:20'],
            'address'    => ['nullable', 'string', 'max:500'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'skin_type'  => ['nullable', 'in:kering,normal,berminyak,kombinasi,berjerawat'],
            'skin_color' => ['nullable', 'in:terang,sedang,gelap'],
            'skin_problem' => ['nullable', 'in:bekas_jerawat,komedo,mata_panda,kulit_kusam,hiperpigmentasi,kulit_kasar,pori_besar,kulit_sensitif,keriput'],
        ]);

        // Upload foto
        if ($request->hasFile('profile_picture')) {
            if (!empty($user->foto_profil)) {
                Storage::disk('public')->delete($user->foto_profil);
            }
            $user->foto_profil = $request->file('profile_picture')->store('profile-pictures', 'public');
        }

        // Update field (pakai array_key_exists supaya null tetap bisa tersimpan)
        if (array_key_exists('first_name', $validated)) $user->nama_depan = $validated['first_name'];
        if (array_key_exists('last_name',  $validated)) $user->nama_belakang = $validated['last_name'];

        $user->email = $validated['email'];

        if (array_key_exists('gender', $validated))  $user->jenis_kelamin = $validated['gender'];
        if (array_key_exists('phone',  $validated))  $user->telepon = $validated['phone'];
        if (array_key_exists('address',$validated))  $user->alamat = $validated['address'];

        if (array_key_exists('skin_type',   $validated)) $user->jenis_kulit = $validated['skin_type'];
        if (array_key_exists('skin_color',  $validated)) $user->warna_kulit = $validated['skin_color'];
        if (array_key_exists('skin_problem',$validated)) $user->masalah_kulit = $validated['skin_problem'];

        // Nama gabungan
        $first = $user->nama_depan ?? '';
        $last  = $user->nama_belakang ?? '';
        $user->nama = trim($first . ' ' . $last);

        $user->save();

        return redirect()->route('edit-account')->with('success', 'Akun berhasil diperbarui!');
    }
}
