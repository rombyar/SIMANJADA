@extends('layouts.public')

@section('title', 'Kegiatan - Majada')

@section('content')
    <h1 class="text-xl font-extrabold text-gray-900 mb-5">Kegiatan</h1>

    <div x-data="{ page: 1, hasMore: {{ $activities->hasMorePages() ? 'true' : 'false' }}, loading: false }">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5" x-ref="list">
            @forelse ($activities as $activity)
                <x-public.partials.activity-items :activities="[$activity]" />
            @empty
                <p class="text-gray-500 text-sm">Belum ada kegiatan yang dibagikan.</p>
            @endforelse
        </div>
        <button
            type="button"
            x-show="hasMore"
            x-cloak
            :disabled="loading"
            @click="
                loading = true;
                fetch('{{ route('activity.index') }}?page=' + (page + 1), { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(r => { hasMore = r.headers.get('X-Has-More') === '1'; return r.text(); })
                    .then(html => { $refs.list.insertAdjacentHTML('beforeend', html); page += 1; loading = false; })
            "
            class="mt-6 mx-auto flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:text-emerald-800 disabled:opacity-50"
        >
            <span x-text="loading ? 'Memuat...' : 'Muat lebih banyak'"></span>
            <x-lucide-chevron-down class="w-4 h-4" />
        </button>
    </div>
@endsection
