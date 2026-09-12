@props(['articles'])

<section>
    <h2 class="text-xl font-extrabold text-gray-900 mb-1">Artikel Terbaru</h2>
    <p class="text-sm text-gray-500 mb-4">Tulisan dan kajian seputar masjid dan kegiatan keagamaan.</p>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        @forelse ($articles as $article)
            <a href="{{ route('blog.show', $article) }}" class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 flex flex-col gap-2 hover:shadow-md transition-shadow">
                <div class="flex items-center gap-1.5 text-xs text-gray-500 font-semibold">
                    <x-lucide-calendar class="w-3.5 h-3.5" />
                    {{ $article->published_at->translatedFormat('d F Y') }}
                </div>
                <div class="font-bold text-gray-900">{{ $article->title }}</div>
                <div class="text-sm text-gray-600">{{ Str::limit(strip_tags($article->content), 90) }}</div>
            </a>
        @empty
            <p class="text-gray-500 text-sm">Belum ada artikel yang dipublikasikan.</p>
        @endforelse
    </div>
</section>
