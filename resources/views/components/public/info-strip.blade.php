@props(['mosque'])

<section class="bg-white rounded-lg shadow-sm border border-gray-100 p-5 mb-10 grid grid-cols-1 sm:grid-cols-3 gap-5">
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center flex-none">
            <x-lucide-map-pin class="w-5 h-5 text-emerald-700" />
        </div>
        <div>
            <div class="text-xs text-gray-500 font-semibold">Alamat</div>
            @if ($mosque->map_url)
                <a href="{{ $mosque->map_url }}" target="_blank" rel="noopener" class="text-sm text-emerald-700 font-semibold hover:underline">{{ $mosque->address }}</a>
            @else
                <div class="text-sm text-gray-900 font-semibold">{{ $mosque->address }}</div>
            @endif
        </div>
    </div>
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center flex-none">
            <x-lucide-landmark class="w-5 h-5 text-emerald-700" />
        </div>
        <div>
            <div class="text-xs text-gray-500 font-semibold">Jenis &amp; Tahun Berdiri</div>
            <div class="text-sm text-gray-900 font-semibold">{{ $mosque->type }} &middot; {{ $mosque->founding_year }}</div>
        </div>
    </div>
    @if ($mosque->phone_number)
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center flex-none">
                <x-lucide-phone class="w-5 h-5 text-emerald-700" />
            </div>
            <div>
                <div class="text-xs text-gray-500 font-semibold">Kontak</div>
                <div class="text-sm text-gray-900 font-semibold">{{ $mosque->phone_number }}</div>
            </div>
        </div>
    @endif
</section>
