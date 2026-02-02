<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan - MAHYRA Aestetic Clinic</title>
    
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
                        serif: ['"Nobile"', 'sans-serif'],
                        sans: ['"Nobile"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- BACKGROUND GRADIENT (PINK ATAS → PUTIH BAWAH) -->
    <style>
        body {
            background: linear-gradient(
                to bottom,
                #FFF0F0 0%,
                #FFF5F5 40%,
                #FFFFFF 100%
            );
            min-height: 100vh;
        }
    </style>
</head>

<body class="font-sans text-brand-dark antialiased overflow-x-hidden">

    @include('partials.navbar')

    <!-- BANNER -->
    <div class="pt-24 pb-12">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-3xl lg:text-4xl font-bold mb-4 text-black">
                <br>Berikan Ulasan Anda
            </h1>
            <p class="text-gray-700 text-lg max-w-3xl mx-auto">
                Ulasan jujur dari Anda membantu kami terus memberikan perawatan terbaik dan pengalaman yang lebih nyaman di setiap kunjungan.
            </p>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <!-- LEFT: REVIEWS -->
                <div class="bg-white rounded-2xl p-8 shadow-xl">
                    <h2 class="text-2xl font-bold mb-6 text-black">Masukkan Terbaru</h2>

                    <div class="space-y-6">
                        @foreach($reviews as $review)
                        <div class="flex items-start gap-4 pb-6 border-b border-gray-200 last:border-b-0 last:pb-0">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-200 to-pink-300 flex items-center justify-center flex-shrink-0 overflow-hidden">
    @if(!empty($review->foto_profil))
        <img src="{{ asset('storage/' . $review->foto_profil) }}" alt="{{ $review->name }}"
             class="w-full h-full object-cover">
    @elseif(!empty($review->name))
        <span class="text-sm font-bold text-white">
            {{ strtoupper(substr($review->name, 0, 1)) }}
        </span>
    @else
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
        </svg>
    @endif
</div>


                            <div class="flex-1">
                                <h3 class="font-bold text-gray-800 mb-1">{{ $review['name'] }}</h3>

                                <div class="flex mb-2">
                                    @for($i = 0; $i < $review['rating']; $i++)
                                    <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    @endfor
                                </div>

                                <p class="text-gray-700 text-sm leading-relaxed">
                                    "{{ $review['review'] }}"
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- RIGHT: FORM -->
                <div class="bg-white rounded-2xl p-8 shadow-xl">
                    <h2 class="text-2xl font-bold mb-6 text-black">Tambahkan Ulasan</h2>

                    <form method="POST" action="{{ route('reviews.store') }}" x-data="{ rating: 0, hoverRating: 0 }">
                        @csrf

                        <!-- RATING -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Tambahkan Rating Kepuasan
                            </label>

                            <div class="flex gap-2">
                                @for($i = 1; $i <= 5; $i++)
                                <button type="button"
                                    @click="rating = {{ $i }}"
                                    @mouseenter="hoverRating = {{ $i }}"
                                    @mouseleave="hoverRating = 0"
                                    class="focus:outline-none">
                                    <svg class="w-8 h-8 transition-colors"
                                         :class="(hoverRating >= {{ $i }} || rating >= {{ $i }}) 
                                         ? 'text-yellow-400 fill-current' 
                                         : 'text-gray-300'"
                                         viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </button>
                                @endfor
                            </div>

                            <input type="hidden" name="rating" x-model="rating" required>
                        </div>

                        <!-- NAME -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                            <input type="text" name="name"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                   placeholder="Masukkan Nama Anda..." required>
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                   placeholder="Masukkan Email Anda..." required>
                        </div>

                        <!-- REVIEW -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tulis Ulasan Anda</label>
                            <textarea name="review" rows="5"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                      placeholder="Ceritakan pengalaman Anda..." required></textarea>
                        </div>

                        <button type="submit"
                                class="w-full px-6 py-3 bg-brand-btn-dark text-white rounded-lg font-medium hover:bg-gray-800 transition">
                            Kirim Ulasan
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
