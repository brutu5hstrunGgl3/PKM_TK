<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $content->title ?? 'Landing Page' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Roboto', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- 🌐 NAVBAR (dinamis dari database) --}}
    <nav class="fixed top-0 left-0 w-full bg-white bg-opacity-80 backdrop-blur-md shadow z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-1000">Welcome</a>

            <ul class="hidden md:flex space-x-8 text-gray-700 font-medium">
                @forelse($menus as $menu)
                    <li><a href="{{ $menu->url }}" class="hover:text-blue-600 transition">{{ $menu->name }}</a></li>
                @empty
                    <li><a href="#" class="text-gray-400 italic">Belum ada menu</a></li>
                @endforelse
            </ul>

            {{-- Tombol menu mobile --}}
            <button id="menu-btn" class="block md:hidden text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- Menu mobile --}}
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <ul class="flex flex-col space-y-2 py-4 px-6 text-gray-700 font-medium">
                @foreach($menus as $menu)
                    <li><a href="{{ $menu->url }}" class="hover:text-blue-600 transition">{{ $menu->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </nav>

    {{-- HERO SECTION --}}
    <section id="home" class="relative w-full h-[85vh] flex items-center justify-center bg-gray-200 overflow-hidden rounded-b-3xl shadow-lg mt-[72px]">
        @if($content && $content->image)
            <img src="{{ asset('storage/' . $content->image) }}" 
                 alt="Gambar Hero"
                 class="absolute inset-0 w-full h-full object-cover object-center opacity-90">
        @endif

        <div class="absolute inset-0 bg-black bg-opacity-40"></div>

        <div class="relative z-10 text-center text-white px-6">
            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-4 drop-shadow-lg">
                {{ $content->title ?? 'Belum ada judul' }}
            </h1>
            <p class="text-lg md:text-xl text-gray-100 max-w-2xl mx-auto leading-relaxed">
                {{ $content->description ?? 'Deskripsi default landing page.' }}
            </p>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-300 text-center py-6 mt-10">
        <p class="text-sm">© {{ date('Y') }} — Dibuat dengan ❤️ menggunakan Laravel & Tailwind CSS</p>
    </footer>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>
