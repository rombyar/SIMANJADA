@props(['activities'])

@foreach ($activities as $activity)
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
@endforeach
