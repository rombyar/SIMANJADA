@extends('layouts.public')

@section('title', 'Blog - Majada')

@section('content')
    <h1 class="text-xl font-extrabold text-gray-900 mb-5">Blog</h1>

    <div class="flex flex-col gap-3">
        @forelse ($articles as $article)
            <a href="{{ route('blog.show', $article) }}" class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 flex flex-col gap-1.5 hover:shadow-md transition-shadow">
                <div class="flex items-center gap-1.5 text-xs text-gray-500 font-semibold">
                    <x-lucide-calendar class="w-3.5 h-3.5" />
                    {{ $article->published_at->translatedFormat('d F Y') }}
                </div>
                <div class="font-bold text-gray-900">{{ $article->title }}</div>
            </a>
        @empty
            <p class="text-gray-500 text-sm">Belum ada artikel.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $articles->links() }}
    </div>
@endsection
