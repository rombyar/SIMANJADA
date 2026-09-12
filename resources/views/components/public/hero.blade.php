@props(['mosque'])

<section class="mb-8">
    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $mosque->name }}</h1>
    <p class="text-gray-600 mt-2 max-w-2xl">{{ Str::limit($mosque->description, 220) }}</p>
    <div class="flex gap-3 flex-wrap mt-4">
        <a href="#jadwal" class="inline-flex items-center gap-2 bg-emerald-700 text-white text-sm font-bold px-5 py-2.5 rounded-lg hover:bg-emerald-800">
            Lihat Jadwal Sholat
            <x-lucide-arrow-right class="w-3.5 h-3.5" />
        </a>
        <a href="#kegiatan" class="inline-flex items-center bg-white border border-gray-300 text-gray-900 text-sm font-bold px-5 py-2.5 rounded-lg hover:bg-gray-50">
            Kegiatan Masjid
        </a>
    </div>
</section>
