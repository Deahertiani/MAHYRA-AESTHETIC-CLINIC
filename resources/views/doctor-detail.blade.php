<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $doctor['name'] }} - MAHYRA Aestetic Clinic</title>

  <link href="https://fonts.googleapis.com/css2?family=Nobile:wght@400;500;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'brand-pink': '#FFF0F0',
            'brand-pink-light': '#FDE8E8',
            'brand-dark': '#1F2937',
            'brand-btn-dark': '#2D3748',
            'brand-teal': '#2C4A52',
            'brand-cream': '#FDF5F0',
          },
          fontFamily: {
            serif: ['"Nobile"', 'sans-serif'],
            sans: ['"Nobile"', 'sans-serif'],
          }
        }
      }
    }
  </script>
</head>

<body class="font-sans text-brand-dark antialiased overflow-x-hidden bg-white">
  @include('partials.navbar')

  <!-- HERO  -->
  <section class="relative pt-16">
    <div class="absolute inset-0 h-[620px] 
     bg-gradient-to-b from-[#FDEAE8] via-[#FDF0EE] to-[#FFFFFF]">
</div>

    <div class="relative container mx-auto px-6 py-16 lg:py-20">
      <div class="max-w-6xl mx-auto">
        <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
          <!-- LEFT -->
          <div class="w-full lg:w-1/2 text-center lg:text-left">
            <p class="text-sm tracking-[0.35em] uppercase font-bold text-brand-teal mb-4">DOKTER KAMI</p>

            <h1 class="text-2xl md:text-2xl lg:text-3xl font-bold text-black mb-3">
              {{ $doctor['name'] }}
            </h1>

            <p class="text-sm md:text-base text-gray-700">
              {{ $doctor['subtitle'] }}
            </p>
          </div>

          <!-- RIGHT -->
          <div class="w-full lg:w-1/2 flex justify-center">
            <div class="w-[280px] h-[320px] md:w-[320px] md:h-[360px] lg:w-[360px] lg:h-[400px] rounded-2xl overflow-hidden shadow-2xl">
              <img src="{{ asset('img/Dokter.png') }}"
                   alt="{{ $doctor['name'] }}"
                   class="w-full h-full object-cover object-[50%_40%]">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- INFO SECTION (sesuai Figma: container gelap rounded besar + 3 card putih) -->
  <section class="bg-white py-14">
    <div class="container mx-auto px-6">
      <div class="max-w-6xl mx-auto">
        <div class="bg-brand-dark rounded-[28px] p-6 md:p-8 lg:p-10 shadow-lg">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- PENDIDIKAN -->
            <div class="bg-white rounded-2xl p-7 md:p-8 shadow-sm">
              <h3 class="text-sm font-bold text-center tracking-[0.22em] text-black uppercase mb-6">
                Pendidikan
              </h3>
              <ul class="space-y-4">
                @foreach($doctor['education'] as $edu)
                  <li class="flex items-start gap-3">
                    <span class="mt-1 text-brand-dark font-bold">•</span>
                    <span class="text-gray-700 text-sm leading-relaxed">{{ $edu }}</span>
                  </li>
                @endforeach
              </ul>
            </div>

            <!-- PENGALAMAN -->
            <div class="bg-white rounded-2xl p-7 md:p-8 shadow-sm">
              <h3 class="text-sm font-bold text-center tracking-[0.22em] text-black uppercase mb-6">
                Pengalaman
              </h3>
              <ul class="space-y-4">
                @foreach($doctor['experience'] as $exp)
                  <li class="flex items-start gap-3">
                    <span class="mt-1 text-brand-dark font-bold">•</span>
                    <div class="text-sm">
                      <div class="text-gray-800 font-semibold">
                        {{ $exp['position'] }} – {{ $exp['company'] }}
                        <span class="text-gray-500 font-normal"> ({{ $exp['period'] }})</span>
                      </div>
                      <p class="text-gray-700 mt-1 leading-relaxed">
                        {{ $exp['description'] }}
                      </p>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>

            <!-- PENGHARGAAN -->
            <div class="bg-white rounded-2xl p-7 md:p-8 shadow-sm">
              <h3 class="text-sm font-bold text-center tracking-[0.22em] text-black uppercase mb-6">
                Penghargaan
              </h3>
              <ul class="space-y-4">
                @foreach($doctor['awards'] as $award)
                  <li class="flex items-start gap-3">
                    <span class="mt-1 text-brand-dark font-bold">•</span>
                    <span class="text-gray-700 text-sm leading-relaxed">{{ $award }}</span>
                  </li>
                @endforeach
              </ul>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Spacer / Footer (fix warna putih yang tadi typo) -->
  <div class="h-16 bg-white"></div>
</body>
</html>
