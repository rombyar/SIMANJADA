@props(['announcements'])

<section id="pengumuman" class="mb-10 scroll-mt-20">
    <div class="flex items-center justify-between gap-3 mb-1">
        <h2 class="text-xl font-extrabold text-gray-900">Pengumuman</h2>
        <a href="{{ route('announcement.index') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800 flex-none">Lihat semua</a>
    </div>
    <p class="text-sm text-gray-500 mb-4">Informasi resmi dari pengurus masjid untuk warga.</p>
    <div class="flex flex-col gap-3">
        @forelse ($announcements as $item)
            <x-public.partials.announcement-items :announcements="[$item]" />
        @empty
            <p class="text-gray-500 text-sm">Belum ada pengumuman saat ini.</p>
        @endforelse
    </div>
</section>
