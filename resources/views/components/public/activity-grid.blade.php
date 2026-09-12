@props(['activities', 'hasMore' => false])

<section id="kegiatan" class="mb-10 scroll-mt-20">
    <div class="flex items-center justify-between gap-3 mb-1">
        <h2 class="text-xl font-extrabold text-gray-900">Kegiatan Terbaru</h2>
        <a href="{{ route('activity.index') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800 flex-none">Lihat semua</a>
    </div>
    <p class="text-sm text-gray-500 mb-4">Aktivitas dan acara terbaru yang diadakan masjid.</p>
    <div x-data="{ offset: 3, hasMore: {{ $hasMore ? 'true' : 'false' }}, loading: false }">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5" x-ref="list">
            @forelse ($activities as $activity)
                <x-public.partials.activity-items :activities="[$activity]" />
            @empty
                <p class="text-gray-500 text-sm">Belum ada kegiatan yang dibagikan. Silakan cek lagi nanti.</p>
            @endforelse
        </div>
        <button
            type="button"
            x-show="hasMore"
            x-cloak
            :disabled="loading"
            @click="
                loading = true;
                fetch('{{ route('load-more', 'activities') }}?offset=' + offset)
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
