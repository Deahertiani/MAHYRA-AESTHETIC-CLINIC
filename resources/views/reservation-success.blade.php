<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Berhasil - MAHYRA Aestetic Clinic</title>

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
                        'brand-teal': '#2C4A52',
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
        <div class="max-w-xl mx-auto">

            <!-- Success Card -->
            <div class="bg-white rounded-2xl p-8 shadow-xl text-center">

                <!-- Success Icon -->
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 bg-brand-teal rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                </div>

                <!-- Success Title -->
                <h1 class="text-2xl font-bold mb-8 text-brand-teal">Reservasi Berhasil!</h1>

                <!-- Reservation Details -->
                <div class="bg-gray-50 rounded-xl p-6 mb-6 text-left">
                    <div class="space-y-4">
                        <div class="flex justify-between border-b border-gray-200 pb-3">
                            <span class="text-gray-600 font-medium">Perawatan :</span>
                            <span class="text-gray-800 font-semibold">{{ session('reservation.treatment') }}</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-3">
                            <span class="text-gray-600 font-medium">Dokter :</span>
                            <span class="text-gray-800">Dr. Eka Dwi Wulan</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-3">
                            <span class="text-gray-600 font-medium">Tanggal :</span>
                            <span
                                class="text-gray-800">{{ \Carbon\Carbon::parse(session('reservation.date'))->format('d/m/Y') }}</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-3">
                            <span class="text-gray-600 font-medium">Waktu :</span>
                            <span class="text-gray-800">{{ session('reservation.time') }}</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-3">
                            <span class="text-gray-600 font-medium">Durasi :</span>
                            <span class="text-gray-800">{{ session('reservation.duration') }}</span>
                        </div>
                        <div class="flex justify-between pt-2">
                            <span class="text-gray-700 font-bold">Total Biaya :</span>
                            <span class="text-gray-800 font-bold">{{ session('reservation.price') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Note -->
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-8 text-left">
                    <p class="text-sm text-amber-800">
                        <span class="font-bold text-amber-900">Catatan:</span>
                        Harap datang 15 menit sebelum waktu janji temu. Pembayaran dapat dilakukan di klinik saat
                        kedatangan.
                    </p>
                </div>

                <!-- Action Button -->
                <a href="{{ route('reservation-history') }}"
                    class="inline-block w-full px-8 py-4 bg-brand-btn-dark text-white rounded-lg font-bold hover:bg-gray-800 transition">
                    Lihat Riwayat Reservasi
                </a>
            </div>

        </div>
    </div>

</body>

</html>