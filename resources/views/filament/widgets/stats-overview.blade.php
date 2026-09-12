@php
    $heading = $this->getHeading();
    $description = $this->getDescription();
@endphp

<x-filament-widgets::widget class="fi-wi-stats-overview grid gap-y-4">
    @if (filled($heading) || filled($description))
        <div class="fi-wi-stats-overview-header grid gap-y-1">
            @if (filled($heading))
                <h3 class="fi-wi-stats-overview-header-heading col-span-full text-base font-semibold leading-6 text-gray-950 dark:text-white">
                    {{ $heading }}
                </h3>
            @endif

            @if (filled($description))
                <p class="fi-wi-stats-overview-header-description overflow-hidden break-words text-sm text-gray-500 dark:text-gray-400">
                    {{ $description }}
                </p>
            @endif
        </div>
    @endif

    <div
        class="fi-wi-stats-overview-stats-ctn grid gap-6"
        style="grid-template-columns: repeat(auto-fit, minmax(180px, 1fr))"
    >
        @foreach ($this->getCachedStats() as $stat)
            {{ $stat }}
        @endforeach
    </div>
</x-filament-widgets::widget>
