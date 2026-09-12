<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Majada')</title>
    <meta name="description" content="@yield('description', 'Jadwal sholat, kegiatan, pengumuman, dan laporan keuangan masjid secara terbuka untuk warga.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
    @php
        $navLinks = [
            ['route' => 'home', 'pattern' => 'home', 'label' => 'Beranda'],
            ['route' => 'schedule.index', 'pattern' => 'schedule.*', 'label' => 'Jadwal'],
            ['route' => 'activity.index', 'pattern' => 'activity.*', 'label' => 'Kegiatan'],
            ['route' => 'announcement.index', 'pattern' => 'announcement.*', 'label' => 'Pengumuman'],
            ['route' => 'finance.index', 'pattern' => 'finance.*', 'label' => 'Keuangan'],
            ['route' => 'blog.index', 'pattern' => 'blog.*', 'label' => 'Blog'],
        ];
    @endphp
    <header class="bg-white border-b border-gray-200 sticky top-0 z-10" x-data="{ open: false }">
        <nav class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-extrabold text-lg tracking-tight text-gray-900 flex-none">
                <x-lucide-building-2 class="w-6 h-6 text-emerald-700" />
                Majada
            </a>
            <div class="hidden sm:flex gap-6 text-sm font-semibold text-gray-600">
                @foreach ($navLinks as $link)
                    <a href="{{ route($link['route']) }}" class="hover:text-emerald-700 whitespace-nowrap {{ request()->routeIs($link['pattern']) ? 'text-emerald-700 font-bold' : '' }}">{{ $link['label'] }}</a>
                @endforeach
            </div>
            <button type="button" @click="open = !open" class="sm:hidden text-gray-700" aria-label="Buka menu navigasi">
                <x-lucide-menu x-show="!open" class="w-6 h-6" />
                <x-lucide-x x-show="open" x-cloak class="w-6 h-6" />
            </button>
        </nav>
        <div x-show="open" x-cloak x-transition class="sm:hidden border-t border-gray-200 px-4 py-3 flex flex-col gap-3 text-sm font-semibold text-gray-600">
            @foreach ($navLinks as $link)
                <a href="{{ route($link['route']) }}" @click="open = false" class="hover:text-emerald-700 {{ request()->routeIs($link['pattern']) ? 'text-emerald-700 font-bold' : '' }}">{{ $link['label'] }}</a>
            @endforeach
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-900 mt-12">
        <div class="max-w-4xl mx-auto px-4 py-8 flex flex-col gap-1">
            <span class="font-extrabold text-white">Majada</span>
            <span class="text-sm text-gray-400">Sistem Informasi Jadwal dan Daftar Masjid (SIMANJADA), transparan untuk warga.</span>
            <span class="text-xs text-gray-500 mt-2">&copy; {{ date('Y') }} Majada. {{ config('app.version') }}</span>
        </div>
    </footer>
</body>
</html>
