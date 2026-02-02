<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $service['title'] }} - MAHYRA Aestetic Clinic</title>

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

    @php
        // Normalisasi title agar mapping tidak gagal karena beda spasi / huruf besar kecil
        $key = strtolower(trim(preg_replace('/\s+/', ' ', $service['title'])));

        // Mapping judul -> nama file gambar (public/img/)
        $imageMap = [
            'mencerahkan wajah'        => 'service-face.png',
            'perawatan kulit berjerawat'=> 'kulit.png',
            'perawatan kulit jerawat'  => 'kulit.png',
            'perawatan anti penuaan'   => 'antipenuaan.png',
            'injeksi botox'            => 'botox.png',
            'perawatan filler'         => 'filer.png',
            'pencerahan badan'         => 'kasur.png',
        ];

        // Sumber gambar final (kalau tidak ada mapping, pakai dari data)
        $imageName = $imageMap[$key] ?? null;
        $imgSrc = $imageName ? asset('img/'.$imageName) : $service['image'];
    @endphp

    <!-- HERO (Figma Style - revised) -->
<section class="relative pt-20">
    <!-- background pink full -->
    <div class="absolute inset-0 bg-[#FFF0F0]"></div>

    <div class="relative container mx-auto px-6">
        <div class="max-w-6xl mx-auto">

            <!-- split layout -->
            <div class="flex flex-col lg:flex-row items-stretch gap-0">

                <!-- LEFT: Image block -->
                <div class="w-full lg:w-[420px]">
                    <!-- geser foto ke bawah -->
                    <div class="w-full h-[240px] lg:h-[260px] overflow-hidden mt-8 lg:mt-12 rounded-[20%] shadow-lg">
                        <img src="{{ $imgSrc }}" alt="{{ $service['title'] }}"
                            class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- RIGHT: Text block -->
                <div class="w-full flex-1">
                    <div class="h-full flex items-center">
                        <div class="px-8 lg:px-12 py-10 lg:py-12">
                            <p class="text-xs lg:text-sm tracking-[0.55em] font-bold text-[#2C4A52] uppercase mb-4">
                                {{ $service['category'] }}
                            </p>

                            <h1 class="text-base lg:text-lg font-bold tracking-[0.6em] text-gray-900 mb-3 uppercase">
                                {{ $service['title'] }}
                            </h1>

                            <p class="text-gray-600 text-sm leading-relaxed max-w-xl">
                                {{ $service['description'] }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- bottom pink spacer -->
    <div class="relative h-20 bg-[#FFF0F0]"></div>
</section>

    <!-- Main Content -->
    <div class="container mx-auto px-6 pb-20">
        <div class="max-w-6xl mx-auto">

            <!-- Penjelasan & Manfaat Section -->
            <div class="bg-white rounded-2xl p-8 shadow-xl mb-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Penjelasan -->
                    <div class="border-2 border-gray-100 rounded-xl p-6">
                        <h2 class="text-xl font-bold mb-4 text-center tracking-widest text-black">PENJELASAN</h2>
                        <p class="text-gray-600 leading-relaxed text-sm text-justify">
                            {{ $service['description_long'] }}
                        </p>
                    </div>

                    <!-- Manfaat Perawatan -->
                    <div class="border-2 border-gray-100 rounded-xl p-6">
                        <h2 class="text-xl font-bold mb-6 text-center tracking-widest text-black">MANFAAT PERAWATAN</h2>
                        <div class="flex flex-col gap-3">
                            @foreach($service['benefits'] as $benefit)
                                <div class="px-4 py-3 bg-brand-btn-dark text-white rounded-full text-sm text-center font-medium">
                                    {{ $benefit }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Reservasi -->
            <form method="POST" action="{{ route('reservasi') }}" x-data="{ selectedDate: '', selectedTime: '' }">
                @csrf
                <input type="hidden" name="treatment_id" value="{{ $service['id'] }}">

                <!-- Pilih Jadwal Section -->
                <div class="bg-white rounded-2xl p-8 shadow-xl mb-8">
                    <h2 class="text-xl font-bold mb-2 text-black">Pilih Jadwal</h2>
                    <p class="text-gray-600 mb-6">Tentukan tanggal dan waktu janji temu Anda</p>

                    <!-- Date Selection -->
                    <div class="mb-8">
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Pilih tanggal</label>
                        <div class="relative max-w-md">
                            <input type="date" id="date" name="date" x-model="selectedDate" min="{{ date('Y-m-d') }}"
                                required
                                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition">
                            <svg class="w-5 h-5 text-gray-400 absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        @error('date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Time Selection -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-4">Pilih Waktu</label>
                        <div class="grid grid-cols-4 gap-3">
                            @foreach($timeSlots as $time)
                                <label class="cursor-pointer">
                                    <input type="radio" name="time" value="{{ $time }}" x-model="selectedTime"
                                        class="hidden peer" required>
                                    <div
                                        class="flex items-center justify-center gap-2 px-4 py-3 border-2 border-gray-200 rounded-full hover:border-pink-300 peer-checked:border-brand-btn-dark peer-checked:bg-brand-btn-dark peer-checked:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="font-medium">{{ $time }}</span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        @error('time')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Section Lengkapi Data Diri -->
                <div class="bg-white rounded-2xl p-8 shadow-xl mb-8">
                    <h2 class="text-xl font-bold mb-2 text-black">Lengkapi Data Diri</h2>
                    <p class="text-gray-600 mb-6">Masukkan Informasi Kontak Anda</p>

                    <div class="space-y-6">
                        <!-- Nama Lengkap -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name"
                                value="{{ old('name', Auth::check() ? Auth::user()->name : '') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Masukkan Nama Lengkap">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email"
                                value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Masukkan Email">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nomor HP -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor HP</label>
                            <input type="text" id="phone" name="phone"
                                value="{{ old('phone', Auth::check() && Auth::user()->phone ? Auth::user()->phone : '') }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Masukkan Nomor HP">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Confirm Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="px-12 py-4 bg-brand-btn-dark text-white rounded-full font-bold text-lg hover:bg-gray-800 transition shadow-lg">
                        Konfirmasi Reservasi
                    </button>
                </div>
            </form>

            @if(session('success'))
                <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm text-center">
                    {{ session('success') }}
                </div>
            @endif

        </div>
    </div>

</body>
</html>
