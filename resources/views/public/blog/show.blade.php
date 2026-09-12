@extends('layouts.public')

@section('title', $article->judul . ' - SIMANJADA')

@section('content')
    <article class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
        @if ($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->judul }}" class="w-full h-56 object-cover rounded-lg mb-4">
        @endif
        <h1 class="text-2xl font-extrabold text-gray-900">{{ $article->judul }}</h1>
        <div class="flex items-center gap-1.5 text-sm text-gray-500 font-semibold mt-2 mb-4">
            <x-lucide-calendar class="w-4 h-4" />
            {{ $article->published_at->translatedFormat('d F Y') }}
        </div>
        <div class="prose max-w-none">
            {!! $article->konten !!}
        </div>
    </article>

    <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-1.5 mt-6 text-sm font-semibold text-emerald-700 hover:underline">
        <x-lucide-arrow-left class="w-3.5 h-3.5" />
        Kembali ke Blog
    </a>
@endsection
