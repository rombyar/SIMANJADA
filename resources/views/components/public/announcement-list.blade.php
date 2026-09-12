@props(['announcements'])

<section id="pengumuman" class="mb-10 scroll-mt-20">
    <h2 class="text-xl font-extrabold text-gray-900 mb-1">Pengumuman</h2>
    <p class="text-sm text-gray-500 mb-4">Informasi resmi dari pengurus masjid untuk warga.</p>
    <div class="flex flex-col gap-3">
        @forelse ($announcements as $item)
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 flex items-start gap-4">
                <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center flex-none">
                    <x-lucide-megaphone class="w-5 h-5 text-emerald-700" />
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 flex-wrap">
                        <p class="font-bold text-gray-900">{{ $item->title }}</p>
                        @if ($item->is_pinned)
                            <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full">Disematkan</span>
                        @endif
                    </div>
                    <p class="text-sm text-gray-500 mb-1">{{ $item->date->translatedFormat('d F Y') }}</p>
                    <p class="text-sm text-gray-700">{{ $item->content }}</p>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-sm">Belum ada pengumuman saat ini.</p>
        @endforelse
    </div>
</section>
