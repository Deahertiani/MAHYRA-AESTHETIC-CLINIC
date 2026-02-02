<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Kulit - MAHYRA Aestetic Clinic</title>

    <link href="https://fonts.googleapis.com/css2?family=Nobile:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

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
        /* Custom styles for radio selection - using pure CSS */
        .skin-option input[type="radio"]:checked + .skin-circle {
            border-color: #ec4899 !important;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.3) !important;
        }
        .skin-option input[type="radio"]:checked ~ .skin-dot {
            opacity: 1 !important;
        }
        .skin-problem-option input[type="radio"]:checked + .skin-problem-container .skin-problem-circle {
            border-color: #ec4899 !important;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.3) !important;
        }
    </style>
</head>

<body class="font-sans text-brand-dark antialiased overflow-x-hidden">

    @include('partials.navbar')

    <!-- Main Content -->
    <div class="container mx-auto px-6 pt-24 lg:pt-32 pb-20">
        <div class="max-w-4xl mx-auto">
            <!-- Skin Profile Form Card -->
            <div class="bg-white rounded-2xl p-8 shadow-xl">
                <!-- Greeting -->
                <!-- Greeting -->
<div class="mb-10 text-center">
    <h1 class="text-3xl font-bold mb-2 text-black">
        Hallo {{ $user->nama ?? 'User' }}
    </h1>
    <p class="text-gray-600 text-lg">
        Beritahu Kami Tentang Kulit Anda.
    </p>
</div>


                <form method="POST" action="{{ route('skin-profile.store') }}">
                    @csrf

                    <!-- Section 1: Skin Type -->
                    <div class="mb-10">
                        <div class="flex items-center gap-2 mb-6">
                            <h2 class="text-xl font-bold text-black">Apa Jenis Kulit Anda?</h2>
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 justify-items-center">
                            @php
                                $skinTypes = [
                                    'kering' => ['label' => 'Kering', 'image' => 'Kering.png'],
                                    'normal' => ['label' => 'Normal', 'image' => 'Normal.png'],
                                    'berminyak' => ['label' => 'Berminyak', 'image' => 'Berminyak.png'],
                                    'kombinasi' => ['label' => 'Kombinasi', 'image' => 'Kombinasi.png'],
                                    'berjerawat' => ['label' => 'Berjerawat', 'image' => 'Berjerawat.png'],
                                ];
                            @endphp
                            @foreach($skinTypes as $key => $type)
                                <label class="skin-option cursor-pointer group relative">
                                    <input type="radio" name="skin_type" value="{{ $key }}" 
                                        {{ ($user->jenis_kulit ?? '') === $key ? 'checked' : '' }}
                                        class="hidden" required>
                                    <div class="skin-circle relative w-24 h-24 rounded-full overflow-hidden border-4 border-gray-200 transition-all transform hover:scale-105">
                                        <img src="{{ asset('img/' . $type['image']) }}" alt="{{ $type['label'] }}"
                                            class="w-full h-full object-cover">
                                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent py-2">
                                            <span class="block text-white font-medium text-xs text-center drop-shadow-md">{{ $type['label'] }}</span>
                                        </div>
                                    </div>
                                    <div class="skin-dot absolute -bottom-2 left-1/2 transform -translate-x-1/2 opacity-0 transition-opacity">
                                        <div class="w-2 h-2 bg-pink-500 rounded-full"></div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        @error('skin_type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Section 2: Skin Color -->
                    <div class="mb-10">
                        <div class="flex items-center gap-2 mb-6">
                            <h2 class="text-xl font-bold text-black">Apa Warna Kulit Anda?</h2>
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex justify-center gap-8">
                            @php
                                $skinColors = [
                                    'terang' => ['label' => 'Terang', 'image' => 'Terang.png'],
                                    'sedang' => ['label' => 'Sedang', 'image' => 'Sedang.png'],
                                    'gelap' => ['label' => 'Gelap', 'image' => 'Gelap.png'],
                                ];
                            @endphp
                            @foreach($skinColors as $key => $color)
                                <label class="skin-option cursor-pointer group relative">
                                    <input type="radio" name="skin_color" value="{{ $key }}"
                                        {{ ($user->warna_kulit ?? '') === $key ? 'checked' : '' }}
                                        class="hidden" required>
                                    <div class="skin-circle relative w-24 h-24 rounded-full overflow-hidden border-4 border-gray-200 transition-all transform hover:scale-105">
                                        <img src="{{ asset('img/' . $color['image']) }}" alt="{{ $color['label'] }}"
                                            class="w-full h-full object-cover">
                                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent py-2">
                                            <span class="block text-white font-medium text-sm text-center drop-shadow-md">{{ $color['label'] }}</span>
                                        </div>
                                    </div>
                                    <div class="skin-dot absolute -bottom-2 left-1/2 transform -translate-x-1/2 opacity-0 transition-opacity">
                                        <div class="w-2 h-2 bg-pink-500 rounded-full"></div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        @error('skin_color')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Section 3: Skin Problems -->
                    <div class="mb-10">
                        <div class="flex items-center gap-2 mb-6">
                            <h2 class="text-xl font-bold text-black">Apa Masalah Kulit Anda?</h2>
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 justify-items-center">
                            @php
                                $skinProblems = [
                                    'bekas_jerawat' => ['label' => 'Bekas Jerawat', 'image' => 'Bekas Jerawat.png'],
                                    'komedo' => ['label' => 'Komedo Hitam/Putih', 'image' => 'Komedo HitamPutih.png'],
                                    'mata_panda' => ['label' => 'Mata Panda', 'image' => 'Mata Panda.png'],
                                    'kulit_kusam' => ['label' => 'Kulit Kusam', 'image' => 'Kulit Kusam.png'],
                                    'hiperpigmentasi' => ['label' => 'Hiperpigmentasi', 'image' => 'HyperPigmentation.png'],
                                    'kulit_kasar' => ['label' => 'Kulit Kasar', 'image' => 'Kulit Kasar.png'],
                                    'pori_besar' => ['label' => 'Pori-pori Besar', 'image' => 'Pori-pori Besar.png'],
                                    'kulit_sensitif' => ['label' => 'Kulit Sensitif', 'image' => 'Kulit Sensitive.png'],
                                    'keriput' => ['label' => 'Keriput', 'image' => 'Keriput.png'],
                                ];
                            @endphp
                            @foreach($skinProblems as $key => $problem)
                                <label class="skin-problem-option cursor-pointer group w-24">
                                    <input type="radio" name="skin_problem" value="{{ $key }}"
                                        {{ ($user->masalah_kulit ?? '') === $key ? 'checked' : '' }}
                                        class="hidden" required>
                                    <div class="skin-problem-container flex flex-col items-center">
                                        <div class="skin-problem-circle w-20 h-20 rounded-full overflow-hidden border-4 border-gray-200 transition-all mb-2 shadow-sm">
                                            <img src="{{ asset('img/' . $problem['image']) }}" alt="{{ $problem['label'] }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <span class="text-xs font-medium text-center text-gray-700 leading-tight group-hover:text-pink-500 transition-colors">{{ $problem['label'] }}</span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        @error('skin_problem')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8">
                        <button type="submit"
                            class="w-full px-6 py-4 bg-brand-btn-dark text-white rounded-lg font-bold text-lg hover:bg-gray-800 transition">
                            Mulailah Perjalanan Mu!
                        </button>
                    </div>
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