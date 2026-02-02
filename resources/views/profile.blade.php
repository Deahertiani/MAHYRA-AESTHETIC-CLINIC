<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - MAHYRA Aestetic Clinic</title>

    <link href="https://fonts.googleapis.com/css2?family=Nobile:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-pink': '#FFF0F0',
                        'brand-btn-dark': '#2D3748',
                    },
                    fontFamily: {
                        sans: ['"Nobile"', 'sans-serif'],
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

<body class="font-sans text-gray-800 antialiased">

    @include('partials.navbar')

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-4 pt-24 pb-16">
        <div class="max-w-xl mx-auto">

            <!-- CARD PROFIL -->
            <div class="bg-white rounded-xl p-5 shadow-lg">

                <h1 class="text-xl font-bold text-center mb-6 text-black">
                    Profil
                </h1>

                <!-- USER INFO -->
                <div class="border border-gray-200 rounded-lg p-4 mb-5">
                    <div class="flex items-center gap-4">

                        <!-- FOTO PROFIL -->
                        <div
                            class="w-16 h-16 rounded-full bg-gradient-to-br from-pink-200 to-pink-300 flex items-center justify-center overflow-hidden flex-shrink-0">
                            @if($user->nama)
                                <span class="text-xl font-bold text-white">
                                    {{ strtoupper(substr($user->nama, 0, 1)) }}
                                </span>
                            @else
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            @endif
                        </div>

                        <!-- DATA USER -->
                        <div class="flex-1">
                            <h2 class="text-lg font-semibold text-black">
                                {{ $user->nama ?? 'User' }}
                            </h2>
                            <p class="text-sm text-gray-500">
                                {{ $user->email }}
                            </p>
                        </div>
                    </div>

                    <!-- BUTTON EDIT -->
                    <a href="{{ route('edit-account') }}"
                        class="mt-4 block w-full text-center py-2 bg-brand-btn-dark text-white rounded-md text-sm font-medium hover:bg-gray-800 transition">
                        Edit Akun
                    </a>
                </div>

                <!-- MENU PROFIL -->
                <div class="divide-y divide-gray-200">

                    <!-- PROFIL KULIT -->
                    <a href="{{ route('skin-profile') }}"
                        class="flex items-center justify-between py-3 hover:bg-gray-50 px-2 rounded-md transition">
                        <span class="text-sm font-medium">Profil Kulit</span>
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                    <!-- PENGATURAN -->
                    <a href="#"
                        class="flex items-center justify-between py-3 hover:bg-gray-50 px-2 rounded-md transition">
                        <span class="text-sm font-medium">Pengaturan</span>
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                    <!-- LOGOUT -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left py-3 hover:bg-gray-50 px-2 rounded-md transition text-sm font-medium">
                            Keluar
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>

</body>
</html>
