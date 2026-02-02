<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAHYRA Aestetic Clinic</title>
    
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

    <!-- Hero Section -->
    <header class="container mx-auto px-6 pt-24 lg:pt-32 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <div class="lg:col-span-5 flex flex-col justify-center">
                <h1 class="text-3xl lg:text-4xl xl:text-5xl font-serif font-bold leading-tight mb-6 text-black">
                    Pancarkan Aura Anda Dengan Perawatan Ahli kami
                </h1>
                <p class="text-gray-700 mb-8 leading-relaxed text-base lg:text-lg">
                    Rasakan perawatan kelas dunia yang di rancang untuk meningkatkan kecantikan unik Anda.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('reservasi') }}"
   class="px-6 py-3 bg-brand-btn-dark text-white rounded-lg font-medium text-sm flex items-center hover:bg-gray-800 transition">
  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
    <circle cx="10" cy="15" r="1.1" fill="currentColor"/>
    <circle cx="14" cy="15" r="1.1" fill="currentColor"/>
  </svg>
  Reservasi Sekarang
</a>

                    <a href="{{ route('services') }}" class="px-6 py-3 bg-white border border-gray-300 text-brand-dark rounded-lg font-medium text-sm flex items-center hover:bg-gray-50 transition">
                        Lihat Layanan 
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-4 relative flex justify-center">
    <div class="w-full max-w-sm h-[450px] lg:h-[500px] overflow-hidden
                rounded-t-[9999px] rounded-b-2xl shadow-xl relative"
         style="background-color:#1F3037;">

        <img src="{{ asset('img/hero-girl.png') }}"
             alt="Model Perawatan"
             class="w-full h-full object-contain"
             style="object-position: center bottom;">
    </div>
</div>


            <div class="lg:col-span-3 flex flex-col justify-end h-full pb-10">
                <div class="lg:pl-4">
                    <p class="text-gray-800 text-sm lg:text-base leading-relaxed mb-6 font-medium">
                        Dokter ahli kami berdedikasi untuk memberikan solusi personal bagi anda untuk mendapatkan kulit yang bercahaya dan sehat
                    </p>
                    
                    <div class="flex items-center gap-3 mb-4">
                        <div class="px-4 py-2 border border-brand-dark rounded-full flex items-center bg-white">
                            <span class="font-bold text-lg mr-1">4.8</span>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                        <a href="{{ route('reviews') }}" class="px-4 py-2 border border-brand-dark rounded-full text-sm font-medium bg-white hover:bg-gray-50 transition">
                            Ulasan Tamu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Second Section: Enhance Natural Glow (doctor.png menyatu dengan background) -->
<section class="container mx-auto px-6 py-20 overflow-visible">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

    <!-- IMAGE -->
    <div class="flex justify-center lg:justify-start">
      <!-- wrapper tanpa bg, tapi pakai MASK agar tepi gambar fade -->
      <div class="w-full max-w-md min-h-[420px] overflow-hidden shadow-xl"
           style="
             border-radius: 3rem;
             -webkit-mask-image: radial-gradient(circle at 50% 50%, #000 65%, transparent 92%);
             mask-image: radial-gradient(circle at 50% 50%, #000 65%, transparent 92%);
           ">
        <img
          src="{{ asset('img/doctor.png') }}"
          alt="Doctor"
          class="w-full h-full object-cover block"
        >
      </div>
    </div>

    <!-- TEXT -->
    <div class="lg:pl-10">
      <h2 class="text-3xl lg:text-4xl font-serif font-bold leading-tight mb-8 text-black">
        Tingkatkan Cahaya Alami Anda Dengan Presisi
      </h2>

      <p class="text-gray-700 leading-relaxed mb-10 text-base lg:text-lg">
        Perawatan khusus kami berfokus pada menonjolkan kecantikan alami Anda dengan presisi dan perhatian,
        mulai dari perawatan wajah yang menyegarkan hingga terapi kulit tingkat lanjut.
      </p>

      <a href="{{ route('services') }}"
         class="inline-flex items-center px-8 py-3 bg-brand-btn-dark text-white rounded-lg font-medium text-sm hover:bg-gray-800 transition">
        Lihat Layanan
      </a>
    </div>

  </div>
</section>


   <!-- Services Section (MATCH FIGMA, DARK COLOR #1F3037) -->
<section class="container mx-auto px-6 py-20">
    <div class="text-center mb-12">
        <h2 class="text-3xl lg:text-4xl font-serif font-bold mb-4 text-black">
            Pancarkan Aura Anda dengan <br> perawatan Ahli Kami
        </h2>
        <p class="text-gray-700 text-base lg:text-lg max-w-2xl mx-auto">
            perawatan yang di sesuai kan untuk meningkatkan pancaran alami Anda, membuat Anda merasa percaya diri dan segar
        </p>
    </div>

    @php
        $featuredService = $services[0] ?? null;
    @endphp

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
        <!-- LEFT: Category Buttons -->
        <div class="lg:col-span-4 space-y-4" x-data="{ activeId: 'wajah' }">
            @foreach($serviceCategories as $category)
                @php
                    $iconMap = [
                        'wajah' => 'wajah.png',
                        'anti-aging' => 'penuaan.png',
                        'injection' => 'injeksi.png',
                        'badan' => 'badan.png',
                    ];
                    $iconFile = $iconMap[$category['id']] ?? 'wajah.png';
                @endphp

                <button
                    @click="activeId = '{{ $category['id'] }}'"
                    class="w-full flex items-center gap-4 px-6 py-4 rounded-xl text-left transition shadow-sm"
                    :class="activeId === '{{ $category['id'] }}'
                        ? 'text-white'
                        : 'text-white opacity-90 hover:opacity-100'"
                    style="background-color:#1F3037;">

                    <!-- icon -->
                    <div class="w-12 h-12 bg-white/10 flex items-center justify-center flex-shrink-0 rounded-full overflow-hidden">
    <img src="{{ asset('img/' . $iconFile) }}"
         alt="icon"
         class="w-full h-full object-cover rounded-full">
</div>


                    <div class="font-semibold text-base">
                        {{ $category['title'] }}
                    </div>
                </button>
            @endforeach
        </div>

        <!-- RIGHT: Featured Card -->
        <div class="lg:col-span-8">
            <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl p-8 shadow-lg">
                @if($featuredService)
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                        <!-- image -->
                        <div class="md:col-span-5">
                            <div class="bg-white/40 rounded-xl p-4">
                                <img src="{{ $featuredService['image'] }}"
                                     alt="{{ $featuredService['title'] }}"
                                     class="w-full h-[220px] object-cover rounded-lg">
                            </div>
                        </div>

                        <!-- content -->
                        <div class="md:col-span-7">
                            <h3 class="text-xl md:text-2xl font-bold text-black leading-tight">
                                {{ $featuredService['title'] }}
                            </h3>

                            <p class="text-gray-800 mt-3 leading-relaxed">
                                {{ $featuredService['desc'] }}
                            </p>

                            <ul class="mt-5 space-y-3">
                                @foreach($featuredService['points'] as $point)
                                    <li class="flex items-start gap-3 text-gray-900">
                                        <span class="mt-1 w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0"
                                              style="background-color:#1F3037;">
                                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span class="text-sm md:text-base">{{ $point }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <p class="text-gray-700">Belum ada data layanan.</p>
                @endif
            </div>
        </div>
    </div>
</section>

    <!-- Testimonials Section -->
    <section class="container mx-auto px-6 py-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-serif font-bold mb-4 text-black">
                Kata Mereka
            </h2>
            <p class="text-gray-700 text-base lg:text-lg max-w-2xl mx-auto">
                Raih kepercayaan diri yang datang dari perawatan kecantikan ahli. Rangkaian perawatan kami akan membantu anda mengungkap potensi sejati anda.
            </p>
        </div>

        <div x-data="{ currentSlide: 1 }" class="relative">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                @foreach($testimonials as $index => $testimonial)
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex mb-4">
                        @for($i = 0; $i < $testimonial['stars']; $i++)
                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-4 italic leading-relaxed">
                        "{{ $testimonial['text'] }}"
                    </p>
                    <p class="font-semibold text-brand-dark">
                        {{ $testimonial['name'] }}
                    </p>
                </div>
                @endforeach
            </div>

            <div class="flex justify-center items-center gap-4 mb-6">
                <button 
                    @click="currentSlide = currentSlide > 1 ? currentSlide - 1 : {{ count($testimonials) }}"
                    class="p-2 rounded-full border border-gray-300 hover:bg-gray-50 transition"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                
                <div class="flex gap-2">
                    @foreach($testimonials as $index => $testimonial)
                    <button 
                        @click="currentSlide = {{ $index + 1 }}"
                        :class="currentSlide === {{ $index + 1 }} ? 'bg-brand-btn-dark text-white' : 'bg-gray-300'"
                        class="w-8 h-8 rounded-full text-sm font-medium transition"
                    >
                        {{ $index + 1 }}
                    </button>
                    @endforeach
                </div>

                <button 
                    @click="currentSlide = currentSlide < {{ count($testimonials) }} ? currentSlide + 1 : 1"
                    class="p-2 rounded-full border border-gray-300 hover:bg-gray-50 transition"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('reviews') }}" class="inline-block px-6 py-3 bg-brand-btn-dark text-white rounded-lg font-medium hover:bg-gray-800 transition">
                    Berikan Ulasan Anda
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="container mx-auto px-6 py-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-serif font-bold mb-4 text-black">
                Mengapa Memilih MAHYRA Aestetic Clinic ?
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach($features as $feature)
    <div class="bg-white rounded-xl p-8 shadow-lg text-center">
        <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full bg-brand-dark">
            @if($feature['icon'] === 'star')
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
            </svg>
            @elseif($feature['icon'] === 'shield')
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
            @else
            <svg class="w-8 h-8 text-white"
     xmlns="http://www.w3.org/2000/svg"
     fill="none"
     stroke="currentColor"
     viewBox="0 0 24 24">

  <path stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

  <!-- dua titik (digeser ke bawah) -->
  <circle cx="10" cy="15.5" r="1.3" fill="currentColor"/>
  <circle cx="14" cy="15.5" r="1.3" fill="currentColor"/>

</svg>

            @endif
        </div>

        <h3 class="text-xl font-bold mb-3 text-black">{{ $feature['title'] }}</h3>
        <p class="text-gray-700 leading-relaxed">{{ $feature['desc'] }}</p>
    </div>
    @endforeach
</div>


    <!-- Promotions Section -->
    <section class="container mx-auto px-6 py-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-serif font-bold mb-4 text-black">
                Promo Hemat
            </h2>
            <p class="text-gray-700 text-base lg:text-lg max-w-2xl mx-auto">
                Nikmati promo yang kami tawarkan untuk perawatan kecantikan anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($promotions as $promo)
            <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-xl p-8 shadow-lg">
                <h3 class="text-2xl font-serif font-bold mb-4 text-black">
                    {{ $promo['title'] }}
                </h3>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    {{ $promo['desc'] }}
                </p>
                <a href="{{ route('reservasi') }}" class="inline-block px-6 py-3 bg-brand-btn-dark text-white rounded-lg font-medium hover:bg-gray-800 transition">
                    {{ $promo['button'] }}
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-20">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- About -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div>
                            <div class="font-serif font-bold text-xl text-brand-dark">MAHYRA</div>
                            <div class="text-xs text-gray-600 font-sans">Aestetic Clinic</div>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-4">
                        Di klinik kecantikan kami, kami berdedikasi untuk meningkatkan kecantikan alami anda melalui perawatan yang di personalisasi dan canggih.
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition">
                            <svg class="w-4 h-4 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition">
                            <svg class="w-4 h-4 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition">
                            <svg class="w-4 h-4 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Opening Hours -->
                <div>
                    <h4 class="font-bold text-lg mb-4 text-brand-dark">Jam Buka</h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li>Senin - Jumat: 09.00 - 21.00</li>
                        <li>Sabtu: 09.00 - 18.00</li>
                        <li>Minggu: Tutup</li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-bold text-lg mb-4 text-brand-dark">Hubungi Kami</h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li>Jl. ngaso no.70 kecamatan Ujung Batu Rokan Hulu - Riau 28125</li>
                        <li>(+62) 811-756-926</li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h4 class="font-bold text-lg mb-4 text-brand-dark">Media Sosial</h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li>Instagram: @mahyraclinic</li>
                        <li>Twitter: @mahyraclinic</li>
                        <li>Email: info@mahyraclinic.com</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-600">
                <p>© 2025 Mahyra. Semua hak di lindungi Undang-undang</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-brand-dark transition">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-brand-dark transition">syarat & ketentuan</a>
                    <a href="#" class="hover:text-brand-dark transition">Tanya</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
