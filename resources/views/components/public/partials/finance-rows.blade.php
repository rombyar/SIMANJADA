@props(['finances'])

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
