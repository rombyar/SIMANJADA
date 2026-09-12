@props(['schedules', 'hasMore' => false])

<section id="jadwal" class="mb-10 scroll-mt-20">
    <div class="flex items-center justify-between gap-3 mb-1">
        <h2 class="text-xl font-extrabold text-gray-900">Jadwal</h2>
        <a href="{{ route('schedule.index') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800 flex-none">Lihat semua</a>
    </div>
    <p class="text-sm text-gray-500 mb-4">Kegiatan rutin dan sholat berjamaah yang bisa diikuti warga.</p>
    <div x-data="{ offset: 3, hasMore: {{ $hasMore ? 'true' : 'false' }}, loading: false }">
        <div class="flex flex-col gap-3" x-ref="list">
            @forelse ($schedules as $schedule)
                <x-public.partials.schedule-items :schedules="[$schedule]" />
            @empty
                <p class="text-gray-500 text-sm">Belum ada jadwal yang dibagikan. Silakan cek lagi nanti.</p>
            @endforelse
        </div>
        <button
            type="button"
            x-show="hasMore"
            x-cloak
            :disabled="loading"
            @click="
                loading = true;
                fetch('{{ route('load-more', 'schedules') }}?offset=' + offset)
                    .then(r => { hasMore = r.headers.get('X-Has-More') === '1'; return r.text(); })
                    .then(html => { $refs.list.insertAdjacentHTML('beforeend', html); offset += 3; loading = false; })
            "
            class="mt-4 mx-auto flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:text-emerald-800 disabled:opacity-50"
        >
            <span x-text="loading ? 'Memuat...' : 'Muat lebih banyak'"></span>
            <x-lucide-chevron-down class="w-4 h-4" />
        </button>
    </div>
</section>
