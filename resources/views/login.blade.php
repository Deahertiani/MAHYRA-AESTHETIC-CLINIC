<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - MAHYRA Aestetic Clinic</title>
    
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
        .logo-bg {
            position: absolute;
            left: 10%;
            top: 50%;
            transform: translateY(-50%);
            width: 600px;
            height: 600px;
            opacity: 0.1;
            z-index: 0;
            pointer-events: none;
        }
        .logo-bg img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
</head>
<body class="font-sans text-brand-dark antialiased overflow-x-hidden">

    @include('partials.navbar')

    <!-- Main Content -->
    <div class="container mx-auto px-6 pt-24 lg:pt-32 pb-20 relative">
        <div class="logo-bg">
            <img src="{{ asset('img/logo-bg.png') }}" alt="Background Logo">
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
            
            <!-- Left Section: Promotional Content -->
            <div class="flex flex-col justify-center">
                <h1 class="text-4xl lg:text-5xl xl:text-6xl font-serif font-bold leading-tight mb-6 text-black">
                    Masuk Akun Untuk Mulai Perawatan Cantikmu
                </h1>
                <p class="text-gray-700 mb-8 leading-relaxed text-base lg:text-lg">
                    Reservasi Perawatan, konsultasi, dan lihat riwayat perawatan dalam satu akun.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-center gap-3 text-gray-700">
                        <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Booking lebih cepat</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Riwayat perawatan tersimpan</span>
                    </li>
                </ul>
            </div>

            <!-- Right Section: Login Form -->
            <div class="bg-white rounded-2xl p-8 shadow-xl">
                <h2 class="text-2xl font-serif font-bold mb-2 text-black">Selamat Datang Kembali!</h2>
                <p class="text-gray-600 mb-6 text-sm">Masuk Untuk Melanjutkan Perawatanmu</p>
                
                <!-- Social Login Buttons -->
                <div class="space-y-3 mb-6">
                    <button
    class="w-full px-4 py-3 bg-brand-btn-dark text-white rounded-lg font-medium flex items-center justify-center gap-3 hover:bg-gray-800 transition"
>
    <svg
        class="w-5 h-5 fill-white"
        viewBox="0 0 384 512"
        aria-hidden="true"
    >
        <path d="M318.7 268.7c-.2-39.3 32.1-58.1 33.6-59-18.3-26.7-46.8-30.4-56.9-30.8-24.2-2.4-47.3 14.2-59.6 14.2-12.3 0-31.3-13.8-51.5-13.4-26.5.4-51 15.4-64.6 39-27.6 47.9-7.1 118.9 19.8 157.7 13.2 19 29 40.4 49.7 39.6 20-.8 27.6-13 51.8-13 24.2 0 31 13 52.1 12.6 21.6-.4 35.3-19.7 48.4-38.8 15.1-22.1 21.3-43.5 21.5-44.6-.5-.2-41.3-15.8-41.6-62.5zM259.6 84.6c11-13.3 18.4-31.8 16.4-50.3-15.9.6-35.1 10.6-46.5 23.9-10.2 11.7-19.2 30.5-16.8 48.5 17.7 1.4 35.9-9 46.9-22.1z"/>
    </svg>

    <span>Daftar Dengan Apple</span>
</button>

                    <button class="w-full px-4 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium flex items-center justify-center gap-3 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Daftar Dengan Google
                    </button>
                </div>

                <!-- Separator -->
                <div class="relative mb-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">atau</span>
                    </div>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login.authenticate') }}">
                    @csrf
                    
                    <div class="space-y-4 mb-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Masukkan email"
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Kata Sandi</label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Masukkan kata sandi"
                            >
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6 text-right">
                        <a href="#" class="text-sm text-gray-600 hover:text-brand-dark transition">Lupa kata sandi?</a>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full px-6 py-3 bg-brand-btn-dark text-white rounded-lg font-medium hover:bg-gray-800 transition"
                    >
                        Masuk Sekarang
                    </button>
                </form>

                @if(session('success'))
                    <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

        </div>
    </div>

</body>
</html>

