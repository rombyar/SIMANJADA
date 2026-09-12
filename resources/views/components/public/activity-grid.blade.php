@props(['activities'])

<section id="kegiatan" class="mb-10 scroll-mt-20">
    <h2 class="text-xl font-extrabold text-gray-900 mb-1">Kegiatan Terbaru</h2>
    <p class="text-sm text-gray-500 mb-4">Aktivitas dan acara terbaru yang diadakan masjid.</p>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        @forelse ($activities as $activity)
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                @if ($activity->image)
                    <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" class="h-36 w-full object-cover">
                @else
                    <div class="h-36 bg-gradient-to-br from-emerald-100 to-emerald-200 flex items-center justify-center">
                        <x-lucide-heart-handshake class="w-9 h-9 text-emerald-700" />
                    </div>
                @endif
                <div class="p-4 flex flex-col gap-1.5">
                    <div class="text-xs font-bold text-emerald-700">{{ $activity->date->translatedFormat('d F Y') }}</div>
                    <div class="font-bold text-gray-900">{{ $activity->title }}</div>
                    <div class="text-sm text-gray-600">{{ Str::limit($activity->description, 90) }}</div>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-sm">Belum ada kegiatan yang dibagikan. Silakan cek lagi nanti.</p>
        @endforelse
    </div>
</section>
