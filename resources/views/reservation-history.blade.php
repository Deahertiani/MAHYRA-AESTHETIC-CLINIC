<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Reservasi - MAHYRA Aestetic Clinic</title>
    
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
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-xl font-bold mb-2 text-black">Riwayat Reservasi</h1>
                <p class="text-gray-600 text-lg">Lihat semua reservasi Perawatan Anda</p>
            </div>

            <!-- Reservation Table Card -->
            <div class="bg-white rounded-2xl p-8 shadow-xl overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-4 px-4 font-bold text-gray-700">Perawatan</th>
                            <th class="text-left py-4 px-4 font-bold text-gray-700">Tanggal & Waktu</th>
                            <th class="text-left py-4 px-4 font-bold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 font-bold text-gray-700">Harga</th>
                            <th class="text-left py-4 px-4 font-bold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $reservation)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="py-4 px-4">
                                <span class="font-medium text-gray-800">{{ $reservation['treatment'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex flex-col">
                                    <span class="text-gray-700">{{ $reservation['date'] }}</span>
                                    <span class="text-gray-500 text-sm">{{ $reservation['time'] }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-block px-4 py-2 rounded-lg text-white text-sm font-medium {{ $reservation['status_color'] }}">
                                    {{ $reservation['status'] }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="font-medium text-gray-800">{{ $reservation['price'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-2">
                                    @if($reservation['can_cancel'])
                                    <form method="POST" action="{{ route('reservation-history.cancel', $reservation['id']) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin membatalkan reservasi ini?')" class="px-4 py-2 bg-red-300 text-white rounded-lg text-sm font-medium hover:bg-red-400 transition">
                                            Batal
                                        </button>
                                    </form>
                                    @endif
                                    <button class="w-10 h-10 rounded-full border-2 border-gray-300 flex items-center justify-center hover:bg-gray-100 transition">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-gray-500">
                                Belum ada reservasi
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(session('success'))
                <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm text-center">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

</body>
</html>

