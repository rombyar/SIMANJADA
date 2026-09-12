@props(['articles', 'hasMore' => false])

<section>
    <div class="flex items-center justify-between gap-3 mb-1">
        <h2 class="text-xl font-extrabold text-gray-900">Artikel Terbaru</h2>
        <a href="{{ route('blog.index') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800 flex-none">Lihat semua</a>
    </div>
    <p class="text-sm text-gray-500 mb-4">Tulisan dan kajian seputar masjid dan kegiatan keagamaan.</p>
    <div x-data="{ offset: 3, hasMore: {{ $hasMore ? 'true' : 'false' }}, loading: false }">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5" x-ref="list">
            @forelse ($articles as $article)
                <x-public.partials.article-items :articles="[$article]" />
            @empty
                <p class="text-gray-500 text-sm">Belum ada artikel yang dipublikasikan.</p>
            @endforelse
        </div>
        <button
            type="button"
            x-show="hasMore"
            x-cloak
            :disabled="loading"
            @click="
                loading = true;
                fetch('{{ route('load-more', 'articles') }}?offset=' + offset)
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
