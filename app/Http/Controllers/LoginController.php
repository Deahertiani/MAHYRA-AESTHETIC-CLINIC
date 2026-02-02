<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Allow "admin" as email for testing
        $email = $request->input('email');
        $isAdminEmail = ($email === 'admin' || $email === 'admin@admin.com');

        $rules = [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];

        // Only validate email format if it's not the admin test account
        if (!$isAdminEmail) {
            $rules['email'][] = 'email';
        }

        $credentials = $request->validate($rules);

        // Try to find user by email (handles both "admin" and "admin@admin.com")
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user && \Illuminate\Support\Facades\Hash::check($credentials['password'], $user->kata_sandi)) {
            Auth::login($user, $request->boolean('remember'));
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        throw ValidationException::withMessages([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
