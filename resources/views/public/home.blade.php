@extends('layouts.public')

@section('title', $masjid?->nama ?? 'SIMANJADA')

@section('content')
    @if (! $masjid)
        <div class="text-center py-20 text-gray-500 flex flex-col items-center gap-3">
            <x-lucide-mosque class="w-10 h-10 text-gray-300" />
            <p>Belum ada data masjid.</p>
        </div>
    @else
        {{-- Hero --}}
        <section class="mb-8">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $masjid->nama }}</h1>
            <p class="text-gray-600 mt-2 max-w-2xl">{{ Str::limit($masjid->deskripsi, 220) }}</p>
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

        {{-- Info strip --}}
        <section class="bg-white rounded-lg shadow-sm border border-gray-100 p-5 mb-10 grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center flex-none">
                    <x-lucide-map-pin class="w-5 h-5 text-emerald-700" />
                </div>
                <div>
                    <div class="text-xs text-gray-500 font-semibold">Alamat</div>
                    <div class="text-sm text-gray-900 font-semibold">{{ $masjid->alamat }}</div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center flex-none">
                    <x-lucide-landmark class="w-5 h-5 text-emerald-700" />
                </div>
                <div>
                    <div class="text-xs text-gray-500 font-semibold">Jenis &amp; Tahun Berdiri</div>
                    <div class="text-sm text-gray-900 font-semibold">{{ $masjid->jenis }} &middot; {{ $masjid->tahun_berdiri }}</div>
                </div>
            </div>
            @if ($masjid->nomor_telepon)
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center flex-none">
                        <x-lucide-phone class="w-5 h-5 text-emerald-700" />
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 font-semibold">Kontak</div>
                        <div class="text-sm text-gray-900 font-semibold">{{ $masjid->nomor_telepon }}</div>
                    </div>
                </div>
            @endif
        </section>

        {{-- Jadwal --}}
        <section id="jadwal" class="mb-10 scroll-mt-20">
            <h2 class="text-xl font-extrabold text-gray-900 mb-4">Jadwal</h2>
            <div class="flex flex-col gap-3">
                @forelse ($masjid->jadwals as $jadwal)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center flex-none">
                            <x-lucide-calendar-days class="w-5 h-5 text-emerald-700" />
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-gray-900">{{ $jadwal->nama }}</p>
                            <p class="text-sm text-gray-500">
                                {{ $jadwal->tanggal->translatedFormat('d F Y') }} &middot; {{ $jadwal->waktu }} &middot; {{ $jadwal->tempat }}
                            </p>
                            <p class="text-sm text-gray-700 mt-1">{{ $jadwal->deskripsi }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">Belum ada jadwal.</p>
                @endforelse
            </div>
        </section>

        {{-- Kegiatan --}}
        <section id="kegiatan" class="mb-10 scroll-mt-20">
            <h2 class="text-xl font-extrabold text-gray-900 mb-4">Kegiatan Terbaru</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                @forelse ($masjid->kegiatans as $kegiatan)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                        @if ($kegiatan->image)
                            <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="{{ $kegiatan->judul }}" class="h-36 w-full object-cover">
                        @else
                            <div class="h-36 bg-gradient-to-br from-emerald-100 to-emerald-200 flex items-center justify-center">
                                <x-lucide-heart-handshake class="w-9 h-9 text-emerald-700" />
                            </div>
                        @endif
                        <div class="p-4 flex flex-col gap-1.5">
                            <div class="text-xs font-bold text-emerald-700">{{ $kegiatan->tanggal->translatedFormat('d F Y') }}</div>
                            <div class="font-bold text-gray-900">{{ $kegiatan->judul }}</div>
                            <div class="text-sm text-gray-600">{{ Str::limit($kegiatan->deskripsi, 90) }}</div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">Belum ada kegiatan.</p>
                @endforelse
            </div>
        </section>
    @endif

    {{-- Artikel --}}
    <section>
        <h2 class="text-xl font-extrabold text-gray-900 mb-4">Artikel Terbaru</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            @forelse ($articles as $article)
                <a href="{{ route('blog.show', $article) }}" class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 flex flex-col gap-2 hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-1.5 text-xs text-gray-500 font-semibold">
                        <x-lucide-calendar class="w-3.5 h-3.5" />
                        {{ $article->published_at->translatedFormat('d F Y') }}
                    </div>
                    <div class="font-bold text-gray-900">{{ $article->judul }}</div>
                    <div class="text-sm text-gray-600">{{ Str::limit(strip_tags($article->konten), 90) }}</div>
                </a>
            @empty
                <p class="text-gray-500 text-sm">Belum ada artikel.</p>
            @endforelse
        </div>
    </section>
@endsection
