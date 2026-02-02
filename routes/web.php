<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RegisterController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/layanan', [ServiceController::class, 'index'])->name('services');
Route::get('/layanan/{id}', [ServiceController::class, 'show'])->name('service.detail');

Route::get('/reservasi', [ReservationController::class, 'create'])->name('reservasi');
Route::post('/reservasi', [ReservationController::class, 'store']);
Route::get('/reservasi/sukses', [ReservationController::class, 'success'])->name('reservasi.success');

Route::get('/daftar', [RegisterController::class, 'show'])->name('register');
Route::post('/daftar', [RegisterController::class, 'store'])->name('register.store');

Route::get('/masuk', [App\Http\Controllers\LoginController::class, 'show'])->name('login');
Route::post('/masuk', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/keluar', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::get('/profil', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');

Route::get('/profil-kulit', [App\Http\Controllers\SkinProfileController::class, 'show'])->name('skin-profile');
Route::post('/profil-kulit', [App\Http\Controllers\SkinProfileController::class, 'store'])->name('skin-profile.store');

Route::get('/edit-akun', [App\Http\Controllers\EditAccountController::class, 'show'])->name('edit-account');
Route::put('/edit-akun', [App\Http\Controllers\EditAccountController::class, 'update'])->name('edit-account.update');

Route::get('/riwayat', [App\Http\Controllers\ReservationHistoryController::class, 'index'])->name('reservation-history');
Route::delete('/riwayat/{id}', [App\Http\Controllers\ReservationHistoryController::class, 'cancel'])->name('reservation-history.cancel');

Route::get('/dokter', [App\Http\Controllers\DoctorController::class, 'show'])->name('doctor');

Route::get('/konsultasi', [App\Http\Controllers\ConsultationController::class, 'index'])->name('consultation');
Route::post('/konsultasi', [App\Http\Controllers\ConsultationController::class, 'store'])->name('consultation.store');

Route::get('/tanya', [App\Http\Controllers\FAQController::class, 'index'])->name('faq');

Route::get('/ulasan', [App\Http\Controllers\ReviewController::class, 'index'])->name('reviews');
Route::post('/ulasan', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');