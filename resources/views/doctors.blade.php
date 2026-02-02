<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter - MAHYRA Aestetic Clinic</title>
    
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
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-bold mb-8 text-center text-black">Dokter Kami</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($doctors as $doctor)
                <a href="{{ route('doctor.show', $doctor['id']) }}" class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition text-center">
                    <div class="w-32 h-32 rounded-full bg-gradient-to-br from-pink-100 to-pink-200 overflow-hidden mx-auto mb-4">
                        <img src="{{ $doctor['image'] }}" alt="{{ $doctor['name'] }}" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-black">{{ $doctor['name'] }}</h3>
                    <p class="text-gray-600">{{ $doctor['title'] }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>

</body>
</html>

