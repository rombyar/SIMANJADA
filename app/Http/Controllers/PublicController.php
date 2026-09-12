<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Mosque;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        $mosque = Mosque::first();

        $mosque?->load([
            'schedules' => fn ($query) => $query->orderBy('date'),
            'activities' => fn ($query) => $query->latest('date')->take(5),
            'announcements' => fn ($query) => $query->orderByDesc('is_pinned')->latest('date')->take(5),
            'finances' => fn ($query) => $query->latest('date')->take(10),
        ]);

        $financeTotals = $mosque
            ? $mosque->finances()->selectRaw('type, sum(amount) as total')->groupBy('type')->pluck('total', 'type')
            : collect();

        $articles = Article::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.home', [
            'mosque' => $mosque,
            'articles' => $articles,
            'totalMasuk' => (float) ($financeTotals['masuk'] ?? 0),
            'totalKeluar' => (float) ($financeTotals['keluar'] ?? 0),
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
