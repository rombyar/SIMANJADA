@props(['schedules'])

@foreach ($schedules as $schedule)
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 flex items-center gap-4">
        <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center flex-none">
            <x-lucide-calendar-days class="w-5 h-5 text-emerald-700" />
        </div>
        <div class="flex-1">
            <p class="font-bold text-gray-900">{{ $schedule->name }}</p>
            <p class="text-sm text-gray-500">
                {{ $schedule->date->translatedFormat('d F Y') }} &middot; {{ $schedule->time }} &middot; {{ $schedule->place }}
            </p>
            <p class="text-sm text-gray-700 mt-1">{{ $schedule->description }}</p>
        </div>
    </div>
@endforeach
