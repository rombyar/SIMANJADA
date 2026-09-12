<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SIMANJADA')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <nav class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-extrabold text-lg tracking-tight text-gray-900">
                <x-lucide-building-2 class="w-6 h-6 text-emerald-700" />
                SIMANJADA
            </a>
            <div class="flex gap-6 text-sm font-semibold text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-emerald-700 {{ request()->routeIs('home') ? 'text-emerald-700' : '' }}">Beranda</a>
                <a href="{{ route('blog.index') }}" class="hover:text-emerald-700 {{ request()->routeIs('blog.*') ? 'text-emerald-700' : '' }}">Blog</a>
            </div>
        </nav>
    </header>

    <main class="max-w-4xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-900 mt-12">
        <div class="max-w-4xl mx-auto px-4 py-8 flex items-center justify-between flex-wrap gap-3">
            <span class="font-extrabold text-white">SIMANJADA</span>
            <span class="text-sm text-gray-400">&copy; {{ date('Y') }} Sistem Informasi Jadwal dan Daftar Masjid.</span>
        </div>
    </footer>
</body>
</html>
