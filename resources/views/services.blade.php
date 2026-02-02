<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - MAHYRA Aestetic Clinic</title>

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
                        sans: ['Nobile', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans text-brand-dark antialiased overflow-x-hidden bg-[#FFF0F0]">

@include('partials.navbar')

<!-- HERO BACKGROUND -->
<section class="relative"
    x-data="{
        q: '',
        cat: 'all',
        norm(str){ return (str || '').toString().toLowerCase().trim(); },
        match(title, desc, category){
            const query = this.norm(this.q);
            const t = this.norm(title);
            const d = this.norm(desc);
            const c = this.norm(category);

            const okText = !query || t.includes(query) || d.includes(query);
            const okCat  = this.cat === 'all' || c === this.cat;
            return okText && okCat;
        }
    }"
>

    <!-- BACKGROUND IMAGE  -->
    <div class="absolute top-0 left-0 w-full h-[420px] bg-cover bg-center bg-no-repeat
     bg-[url('{{ asset('img/foto_layanan.png') }}')]">
</div>



    <!-- OVERLAY PUTIH TIPIS -->
    <div class="absolute top-0 left-0 w-full h-[420px] bg-white/60"></div>

    <!-- CONTENT -->
    <div class="relative container mx-auto px-6 pt-28 pb-12">
        <div class="max-w-7xl mx-auto text-center">

            <h1 class="text-3xl lg:text-4xl font-bold text-black mb-4">
                Cantik Dimulai dari Perawatan yang Tepat
            </h1>

            <p class="text-gray-700 max-w-2xl mx-auto mb-8">
                Jelajahi layanan unggulan kami dan jadwalkan perawatan Anda hari ini.
            </p>

            <!-- SEARCH + FILTER -->
            <div class="max-w-2xl mx-auto">
                <div class="bg-white/70 backdrop-blur-md border border-white/60 rounded-2xl p-4 md:p-5 shadow-sm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- SEARCH -->
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>

                            <input
                                x-model="q"
                                type="text"
                                placeholder="Cari Perawatan....."
                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 bg-white/90 focus:ring-2 focus:ring-pink-200 outline-none"
                            >
                        </div>

                        <!-- CATEGORY -->
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>

                            <select
                                x-model="cat"
                                class="w-full pl-12 pr-10 py-3 rounded-xl border border-gray-200 bg-white/90 focus:ring-2 focus:ring-pink-200 outline-none appearance-none"
                            >
                                <option value="all">Semua Kategori.....</option>
                                <option value="wajah">Wajah</option>
                                <option value="injeksi">Injeksi</option>
                                <option value="badan">Badan</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ================= SERVICES ================= -->
    
    <section class="relative container mx-auto px-6 mt-8 pb-20">
        <div class="max-w-7xl mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($services as $service)

                    @php
                        // mapping title -> gambar
                        $key = strtolower(trim(preg_replace('/\s+/', ' ', $service['title'])));

                        $imageMap = [
                            'mencerahkan wajah'            => 'service-face.png',
                            'perawatan kulit jerawat'      => 'kulit.png',
                            'perawatan kulit berjerawat'   => 'kulit.png',
                            'perawatan anti penuaan'       => 'antipenuaan.png',
                            'injeksi botox'                => 'botox.png',
                            'perawatan filler'             => 'filer.png',
                            'pencerahan badan'             => 'kasur.png',
                        ];

                        $imageName = $imageMap[$key] ?? null;
                        $imgSrc = $imageName ? asset('img/'.$imageName) : $service['image'];

                        // NORMALISASI KATEGORI biar cocok sama select (wajah/injeksi/badan)
                        // Kalau category kamu kadang "Peremajaan wajah", ini tetap masuk "wajah"
                        $rawCat = strtolower(trim($service['category']));
                        if (str_contains($rawCat, 'wajah'))   $catNorm = 'wajah';
                        elseif (str_contains($rawCat, 'injek')) $catNorm = 'injeksi';
                        elseif (str_contains($rawCat, 'badan')) $catNorm = 'badan';
                        else $catNorm = $rawCat;
                    @endphp

                    <div
                        x-show="match(@js($service['title']), @js($service['description']), @js($catNorm))"
                        x-transition
                        class="bg-white rounded-2xl overflow-hidden shadow-lg"
                    >

                        <!-- IMAGE -->
                        <div class="relative h-56">
                            <img src="{{ $imgSrc }}" alt="{{ $service['title'] }}"
                                 class="w-full h-full object-cover">

                            <span class="absolute top-3 right-3 bg-red-700 text-white text-xs px-3 py-1 rounded-full">
                                {{ $service['price'] }}
                            </span>
                        </div>

                        <!-- CONTENT -->
                        <div class="p-6">
                            <span class="inline-block bg-gray-200 text-gray-700 text-xs px-3 py-1 rounded-full mb-3">
                                {{ $service['category'] }}
                            </span>

                            <h3 class="text-lg font-bold mb-2">
                                {{ $service['title'] }}
                            </h3>

                            <p class="text-sm text-gray-600 mb-4">
                                {{ $service['description'] }}
                            </p>

                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-4">
                                ⏱ Durasi : {{ $service['duration'] }}
                            </div>

                            <a href="{{ route('service.detail', ['id' => $service['id']]) }}"
                               class="block text-center bg-brand-btn-dark text-white py-3 rounded-lg font-medium hover:bg-gray-800">
                                Reservasi
                            </a>
                        </div>

                    </div>
                @endforeach

            </div>

            <!-- BUTTON -->
            <div class="text-center mt-12">
                <button class="px-8 py-3 border border-gray-300 rounded-lg bg-white hover:bg-gray-50">
                    Tampilkan Semua Perawatan
                </button>
            </div>

        </div>
    </section>

</section>

</body>
</html>
