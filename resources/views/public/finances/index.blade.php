@extends('layouts.public')

@section('title', 'Keuangan - Majada')

@section('content')
    <h1 class="text-xl font-extrabold text-gray-900 mb-5">Keuangan Masjid</h1>

    <form method="GET" class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 mb-5 grid grid-cols-1 sm:grid-cols-4 gap-3 items-end">
        <div class="w-full">
            <label class="block text-xs text-gray-500 font-semibold mb-1">Jenis</label>
            <select name="type" class="w-full rounded-md border-gray-300 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                <option value="" @selected(!request('type'))>Semua</option>
                <option value="masuk" @selected(request('type') === 'masuk')>Pemasukan</option>
                <option value="keluar" @selected(request('type') === 'keluar')>Pengeluaran</option>
            </select>
        </div>
        <div class="w-full">
            <label class="block text-xs text-gray-500 font-semibold mb-1">Dari</label>
            <input type="date" name="from" value="{{ request('from') }}" class="w-full rounded-md border-gray-300 text-sm focus:border-emerald-500 focus:ring-emerald-500">
        </div>
        <div class="w-full">
            <label class="block text-xs text-gray-500 font-semibold mb-1">Sampai</label>
            <input type="date" name="to" value="{{ request('to') }}" class="w-full rounded-md border-gray-300 text-sm focus:border-emerald-500 focus:ring-emerald-500">
        </div>
        <div class="w-full flex items-center gap-3">
            <button type="submit" class="flex-1 px-4 py-2 rounded-md bg-emerald-700 text-white text-sm font-semibold hover:bg-emerald-800">Terapkan</button>
            @if (request('type') || request('from') || request('to'))
                <a href="{{ route('finance.index') }}" class="text-sm font-semibold text-gray-500 hover:text-gray-700 whitespace-nowrap">Reset</a>
            @endif
        </div>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-5">
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4">
            <div class="text-xs text-gray-500 font-semibold">Total Pemasukan</div>
            <div class="text-lg font-extrabold text-emerald-700 mt-1">Rp{{ number_format($totalMasuk, 0, ',', '.') }}</div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4">
            <div class="text-xs text-gray-500 font-semibold">Total Pengeluaran</div>
            <div class="text-lg font-extrabold text-red-600 mt-1">Rp{{ number_format($totalKeluar, 0, ',', '.') }}</div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4">
            <div class="text-xs text-gray-500 font-semibold">Saldo Akhir</div>
            <div class="text-lg font-extrabold text-gray-900 mt-1">Rp{{ number_format($totalMasuk - $totalKeluar, 0, ',', '.') }}</div>
        </div>
    </div>

    @if ($finances->isEmpty())
        <p class="text-gray-500 text-sm">Belum ada catatan transaksi keuangan.</p>
    @else
        <div x-data="{ page: 1, hasMore: {{ $finances->hasMorePages() ? 'true' : 'false' }}, loading: false }">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-xs text-gray-500 font-semibold border-b border-gray-100">
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Keterangan</th>
                            <th class="px-4 py-3">Jenis</th>
                            <th class="px-4 py-3 text-right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody x-ref="list">
                        <x-public.partials.finance-rows :finances="$finances" />
                    </tbody>
                </table>
            </div>
            <button
                type="button"
                x-show="hasMore"
                x-cloak
                :disabled="loading"
                @click="
                    loading = true;
                    fetch('{{ route('finance.index') }}?{{ http_build_query(collect(request()->query())->except('page')->all()) }}&page=' + (page + 1), { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                        .then(r => { hasMore = r.headers.get('X-Has-More') === '1'; return r.text(); })
                        .then(html => { $refs.list.insertAdjacentHTML('beforeend', html); page += 1; loading = false; })
                "
                class="mt-4 mx-auto flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:text-emerald-800 disabled:opacity-50"
            >
                <span x-text="loading ? 'Memuat...' : 'Muat lebih banyak'"></span>
                <x-lucide-chevron-down class="w-4 h-4" />
            </button>
        </div>
    @endif
@endsection
