@props(['finances', 'totalMasuk', 'totalKeluar'])

<section id="keuangan" class="mb-10 scroll-mt-20">
    <h2 class="text-xl font-extrabold text-gray-900 mb-1">Keuangan Masjid</h2>
    <p class="text-sm text-gray-500 mb-4">Laporan diperbarui oleh pengurus masjid secara berkala, terbuka untuk warga.</p>

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
                <tbody>
                    @foreach ($finances as $item)
                        <tr class="border-b border-gray-50 last:border-0">
                            <td class="px-4 py-3 text-gray-500 whitespace-nowrap">{{ $item->date->translatedFormat('d F Y') }}</td>
                            <td class="px-4 py-3 text-gray-900">{{ $item->notes }}</td>
                            <td class="px-4 py-3">
                                <span class="text-xs font-bold px-2 py-0.5 rounded-full {{ $item->type === 'masuk' ? 'text-emerald-700 bg-emerald-50' : 'text-red-600 bg-red-50' }}">
                                    {{ $item->type === 'masuk' ? 'Pemasukan' : 'Pengeluaran' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right font-semibold whitespace-nowrap {{ $item->type === 'masuk' ? 'text-emerald-700' : 'text-red-600' }}">
                                {{ $item->type === 'masuk' ? '+' : '-' }}Rp{{ number_format($item->amount, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</section>
