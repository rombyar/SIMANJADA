@props(['articles'])

@foreach ($articles as $article)
    <a href="{{ route('blog.show', $article) }}" class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 flex flex-col gap-1.5 hover:shadow-md transition-shadow">
        <div class="flex items-center gap-1.5 text-xs text-gray-500 font-semibold">
            <x-lucide-calendar class="w-3.5 h-3.5" />
            {{ $article->published_at->translatedFormat('d F Y') }}
        </div>
        <div class="font-bold text-gray-900">{{ $article->title }}</div>
    </a>
@endforeach
