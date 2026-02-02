<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanya - MAHYRA Aestetic Clinic</title>
    
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

    <!-- Main Content -->
    <div class="container mx-auto px-6 pt-24 lg:pt-32 pb-20">
        <div class="max-w-4xl mx-auto">
            <!-- Title Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl lg:text-4xl font-bold mb-4 text-black">
                    TANYA ?
                </h1>
                <h2 class="text-1xl lg:text-1xl font-bold mb-2 text-gray-800">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-gray-600 text-lg">Temukan jawab untuk pertanyaan umum disini</p>
            </div>

            <!-- FAQ List -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden" x-data="{ openId: {{ $faqs[0]['id'] }} }">
                @foreach($faqs as $faq)
                <div class="border-b border-gray-200 last:border-b-0">
                    <button 
                        @click="openId = openId === {{ $faq['id'] }} ? null : {{ $faq['id'] }}"
                        class="w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition text-left"
                    >
                        <span class="font-bold text-gray-800 text-lg">{{ $faq['question'] }}</span>
                        <svg 
                            class="w-5 h-5 text-gray-600 transition-transform"
                            :class="{ 'rotate-180': openId === {{ $faq['id'] }} }"
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div 
                        x-show="openId === {{ $faq['id'] }}"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2"
                        class="px-6 pb-4"
                    >
                        <p class="text-gray-700 leading-relaxed">{{ $faq['answer'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</body>
</html>

