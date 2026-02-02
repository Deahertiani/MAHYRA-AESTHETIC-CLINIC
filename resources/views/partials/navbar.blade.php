<!-- Header Navigation -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-sm border-b border-pink-100 shadow-sm">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-12 w-auto object-contain">
            </a>
        </div>

        <div class="hidden lg:flex space-x-8 text-sm font-medium text-gray-700">
            <a href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'text-brand-dark font-semibold' : 'hover:text-gray-500 transition' }}">Beranda</a>
            <a href="{{ route('services') }}"
                class="{{ request()->routeIs('services') ? 'text-brand-dark font-semibold' : 'hover:text-gray-500 transition' }}">Layanan</a>
            <a href="{{ route('doctor') }}"
                class="{{ request()->routeIs('doctor') ? 'text-brand-dark font-semibold' : 'hover:text-gray-500 transition' }}">Dokter</a>
            <a href="{{ route('reservasi') }}"
                class="{{ request()->routeIs('reservasi') ? 'text-brand-dark font-semibold' : 'hover:text-gray-500 transition' }}">Reservasi</a>
            <a href="{{ route('consultation') }}"
                class="{{ request()->routeIs('consultation') ? 'text-brand-dark font-semibold' : 'hover:text-gray-500 transition' }}">Konsultasi</a>
            <a href="{{ route('faq') }}"
                class="{{ request()->routeIs('faq') ? 'text-brand-dark font-semibold' : 'hover:text-gray-500 transition' }}">Tanya</a>
        </div>

        <div class="hidden md:flex items-center space-x-3">
            @auth
                <a href="{{ route('reservation-history') }}"
                    class="px-6 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50 transition text-gray-700 {{ request()->routeIs('reservation-history') ? 'border-brand-btn-dark' : '' }}">Riwayat</a>
                <a href="{{ route('profile') }}"
                    class="px-6 py-2 bg-brand-btn-dark text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition">Profil</a>
            @else
                <a href="{{ route('login') }}"
                    class="px-6 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50 transition text-gray-700">Login</a>
                <a href="{{ route('register') }}"
                    class="px-6 py-2 bg-brand-btn-dark text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition">Daftar</a>
            @endauth
        </div>
    </div>
</nav>