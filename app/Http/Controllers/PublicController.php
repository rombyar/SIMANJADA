<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Masjid;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        $masjid = Masjid::first();

        $masjid?->load([
            'jadwals' => fn ($query) => $query->orderBy('tanggal'),
            'kegiatans' => fn ($query) => $query->latest('tanggal')->take(5),
        ]);

        $articles = Article::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.home', [
            'masjid' => $masjid,
            'articles' => $articles,
        ]);
    }

    public function blogIndex(): View
    {
        $articles = Article::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(9);

        return view('public.blog.index', [
            'articles' => $articles,
        ]);
    }

    public function blogShow(Article $article): View
    {
        abort_if(
            blank($article->published_at) || $article->published_at->isFuture(),
            404
        );

        return view('public.blog.show', [
            'article' => $article,
        ]);
    }
}
