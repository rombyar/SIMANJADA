@extends('layouts.public')

@section('title', $mosque?->name ?? 'Majada')
@section('description', $mosque ? Str::limit($mosque->description, 150) : 'Jadwal sholat, kegiatan, pengumuman, dan laporan keuangan masjid secara terbuka untuk warga.')

@section('content')
    @if (! $mosque)
        <div class="text-center py-20 text-gray-500 flex flex-col items-center gap-3">
            <x-lucide-mosque class="w-10 h-10 text-gray-300" />
            <p>Data masjid belum tersedia. Silakan cek lagi nanti.</p>
        </div>
    @else
        <x-public.hero :mosque="$mosque" />
        <x-public.info-strip :mosque="$mosque" />
        <x-public.announcement-list :announcements="$mosque->announcements" />
        <x-public.schedule-list :schedules="$mosque->schedules" :has-more="$schedulesHasMore" />
    @endif

    <x-public.article-grid :articles="$articles" :has-more="$articlesHasMore" />
@endsection
