<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi - MAHYRA Aestetic Clinic</title>

    <link href="https://fonts.googleapis.com/css2?family=Nobile:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-pink': '#FFF0F0',
                        'brand-pink-light': '#FFF5F5',
                        'brand-dark': '#1F2937',
                        'brand-btn-dark': '#2D3748',
                    },
                    fontFamily: {
                        'serif': ['"Nobile"', 'sans-serif'],
                        'sans': ['"Nobile"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background: linear-gradient(to bottom, #FFF0F0 0%, #FFFFFF 100%);
            min-height: 100vh;
        }
    </style>
</head>

<body class="font-sans text-brand-dark antialiased overflow-x-hidden">

@include('partials.navbar')

<!-- ================== HERO BACKGROUND (SESUAI FIGMA) ================== -->
<section class="relative">
    <!-- background image -->
    <div class="absolute top-0 left-0 w-full h-[260px] bg-cover bg-center bg-no-repeat
            bg-[url('{{ asset('img/foto_reservasi.png') }}')]">
</div>

    <!-- overlay gelap tipis -->
    <div class="absolute top-0 left-0 w-full h-[260px] bg-black/20"></div>

    <!-- teks hero -->
    <div class="relative container mx-auto px-6 pt-28 pb-10">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-2xl md:text-3xl font-bold text-black">
                Reservasi Perawatan Anda
            </h1>
            <p class="text-xs md:text-sm text-gray-700 max-w-2xl mx-auto mt-2 leading-relaxed">
                Pilih jadwal dan layanan perawatan yang Anda inginkan.
                Tim kami siap membantu Anda tampil percaya diri dengan kulit sehat dan bersinar.
            </p>
        </div>
    </div>
</section>

<!-- ================== FORM WRAPPER (PANEL PUTIH) ================== -->
<section class="container mx-auto px-6 -mt-10 pb-16">
    <div class="max-w-6xl mx-auto">
        <form method="POST" action="{{ route('reservasi') }}"
              x-data="{ selectedTreatment: '', selectedDate: '', selectedTime: '' }">
            @csrf

            <!-- PANEL BESAR (seperti figma) -->
            <div class="bg-white/90 backdrop-blur rounded-2xl border border-gray-200 shadow-lg p-6 md:p-8">

                <!-- ================== PILIH PERAWATAN ================== -->
                <div class="bg-white rounded-xl border border-gray-200 p-5 md:p-6 mb-4">
                    <h2 class="text-sm font-bold text-black mb-1">Pilih Perawatan</h2>
                    <p class="text-xs text-gray-600 mb-4">Pilih layanan perawatan yang Anda inginkan</p>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        @foreach($treatments as $treatment)
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="treatment_id"
                                value="{{ $treatment['id'] }}"
                                x-model="selectedTreatment"
                                class="hidden peer"
                                required
                            >

                            <!-- kartu kecil seperti figma -->
                            <div class="h-[70px] rounded-lg border border-gray-300 bg-white
                                        flex items-center gap-3 px-3
                                        hover:border-gray-400
                                        peer-checked:border-brand-btn-dark peer-checked:ring-2 peer-checked:ring-brand-btn-dark/15
                                        transition">

                                <!-- Icon kecil -->
                                <div class="w-9 h-9 rounded-md border border-gray-200 flex items-center justify-center text-gray-600 peer-checked:text-brand-btn-dark">
                                    @if($treatment['icon'] === 'face')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    @elseif($treatment['icon'] === 'acne')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @elseif($treatment['icon'] === 'anti-aging')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M13 3l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                        </svg>
                                    @elseif($treatment['icon'] === 'syringe')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                        </svg>
                                    @elseif($treatment['icon'] === 'body')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"></path>
                                        </svg>
                                    @elseif($treatment['icon'] === 'mask')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    @endif
                                </div>

                                <div class="min-w-0">
                                    <div class="text-[11px] font-semibold text-gray-800 leading-tight truncate">
                                        {{ $treatment['title'] }}
                                    </div>
                                    <div class="text-[10px] text-gray-500 mt-0.5">
                                        {{ $treatment['price'] }}
                                    </div>
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>

                    @error('treatment_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ================== PILIH JADWAL ================== -->
                <div class="bg-white rounded-xl border border-gray-200 p-5 md:p-6 mb-4">
                    <h2 class="text-sm font-bold text-black mb-1">Pilih Jadwal</h2>
                    <p class="text-xs text-gray-600 mb-4">Tentukan tanggal dan waktu janji temu Anda</p>

                    <!-- tanggal -->
                    <div class="mb-5">
                        <label for="date" class="block text-xs font-semibold text-gray-700 mb-2">Pilih tanggal</label>
                        <div class="relative max-w-md">
                            <input
                                type="date"
                                id="date"
                                name="date"
                                x-model="selectedDate"
                                min="{{ date('Y-m-d') }}"
                                required
                                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg bg-white
                                       focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                            >
                            <svg class="w-5 h-5 text-gray-400 absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        @error('date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- waktu -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-3">Pilih Waktu</label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            @foreach($timeSlots as $time)
                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    name="time"
                                    value="{{ $time }}"
                                    x-model="selectedTime"
                                    class="hidden peer"
                                    required
                                >
                                <div class="h-10 rounded-lg border border-gray-200 bg-white
                                            flex items-center justify-center gap-2 px-3
                                            hover:border-gray-300
                                            peer-checked:border-brand-btn-dark peer-checked:bg-brand-btn-dark/5
                                            transition">
                                    <svg class="w-4 h-4 text-gray-500 peer-checked:text-brand-btn-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm font-medium text-gray-700 peer-checked:text-brand-btn-dark">{{ $time }}</span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                        @error('time')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- ================== LENGKAPI DATA DIRI ================== -->
                <div class="bg-white rounded-xl border border-gray-200 p-5 md:p-6 mb-6">
                    <h2 class="text-sm font-bold text-black mb-1">Lengkapi Data Diri</h2>
                    <p class="text-xs text-gray-600 mb-5">Masukkan Informasi Kontak Anda</p>

                    <div class="space-y-4 max-w-md">
                        <!-- Nama -->
                        <div>
                            <label for="name" class="block text-xs font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', Auth::check() ? Auth::user()->name : '') }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white
                                       focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Masukkan Nama Lengkap"
                            >
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-xs font-semibold text-gray-700 mb-2">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white
                                       focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Masukkan Email"
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- HP -->
                        <div>
                            <label for="phone" class="block text-xs font-semibold text-gray-700 mb-2">Nomor HP</label>
                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone', Auth::check() ? Auth::user()->phone : '') }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white
                                       focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Masukkan Nomor HP"
                            >
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- ================== BUTTON ================== -->
                <div class="flex justify-center">
                    <button
                        type="submit"
                        class="px-10 py-3 bg-brand-btn-dark text-white rounded-lg font-semibold text-sm hover:bg-gray-800 transition"
                    >
                        Konfirmasi Reservasi
                    </button>
                </div>

            </div>
        </form>

        @if(session('success'))
            <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm text-center">
                {{ session('success') }}
            </div>
        @endif
    </div>
</section>

</body>
</html>
