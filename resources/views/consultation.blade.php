<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi - MAHYRA Aestetic Clinic</title>

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
            <!-- Chat Interface Card -->
            <div class="bg-gray-100 rounded-2xl shadow-xl overflow-hidden">
                <!-- Chat Header -->
                <div class="bg-white border-b border-gray-200 px-6 py-4 flex items-center gap-3">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-8 w-auto object-contain">
                    <div>
                        <h2 class="font-bold text-gray-800">MAHYRA Aesthetic Clinic</h2>
                        <p class="text-xs text-gray-500"></p>
                    </div>
                </div>

                <!-- Chat Messages Area -->
                <div id="chat-messages" class="h-[500px] overflow-y-auto p-6 space-y-4 bg-gray-50">
                    @foreach($messages as $msg)
                        @if($msg['sender'] === 'bot')
                            <!-- Bot Message (Left) -->
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-gradient-to-br from-pink-200 to-pink-300 flex items-center justify-center flex-shrink-0">
                                    <img src="{{ asset('img/logo.png') }}" alt="Clinic" class="w-6 h-6 object-contain">
                                </div>
                                <div class="flex-1">
                                    <div class="bg-brand-btn-dark text-white rounded-2xl rounded-tl-sm px-4 py-3 max-w-md">
                                        <p class="text-sm">{{ $msg['message'] }}</p>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1 ml-2">{{ $msg['time'] }}</p>
                                </div>
                            </div>
                        @else
                            <!-- User Message (Right) -->
                            <div class="flex items-start gap-3 justify-end">
                                <div class="flex-1 flex justify-end">
                                    <div class="max-w-md">
                                        <div class="bg-brand-btn-dark text-white rounded-2xl rounded-tr-sm px-4 py-3">
                                            <p class="text-sm">{{ $msg['message'] }}</p>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1 mr-2 text-right">{{ $msg['time'] }}</p>
                                    </div>
                                </div>
                                <div
                                    class="w-8 h-8 rounded-full bg-gradient-to-br from-pink-200 to-pink-300 flex items-center justify-center flex-shrink-0 overflow-hidden">
                                    @if(Auth::check() && Auth::user()->foto_profil)
                                        <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="User"
                                            class="w-full h-full object-cover">
                                    @elseif(Auth::check() && Auth::user()->nama)
                                        <span
                                            class="text-xs font-bold text-white">{{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}</span>
                                    @else
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Message Input Area -->
                <div class="bg-white border-t border-gray-200 px-6 py-4">
                    <form method="POST" action="{{ route('consultation.store') }}" class="flex items-center gap-3">
                        @csrf
                        <!-- Attachment Button -->
                        <button type="button"
                            class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center hover:bg-gray-300 transition flex-shrink-0">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                        </button>

                        <!-- Message Input -->
                        <input type="text" name="message" placeholder="Pesan.." required
                            class="flex-1 px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition">

                        <!-- Send Button -->
                        <button type="submit"
                            class="px-6 py-3 bg-brand-btn-dark text-white rounded-lg font-medium hover:bg-gray-800 transition">
                            Kirim
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-scroll to bottom of chat
        document.addEventListener('DOMContentLoaded', function () {
            const chatMessages = document.getElementById('chat-messages');
            if (chatMessages) {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        });
    </script>

</body>

</html>