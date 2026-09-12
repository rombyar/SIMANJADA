<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Announcement;
use App\Models\Article;
use App\Models\Finance;
use App\Models\Mosque;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        $mosque = Mosque::first();

        $mosque?->load([
            'schedules' => fn ($query) => $query->orderBy('date')->take(3),
            'announcements' => fn ($query) => $query->orderByDesc('is_pinned')->latest('date')->take(1),
        ]);

        $articles = Article::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.home', [
            'mosque' => $mosque,
            'articles' => $articles,
            'schedulesHasMore' => $mosque && $mosque->schedules()->orderBy('date')->skip(3)->limit(1)->exists(),
            'articlesHasMore' => Article::whereNotNull('published_at')->where('published_at', '<=', now())->skip(3)->limit(1)->exists(),
        ]);
    }

    public function loadMore(string $section, Request $request): Response
    {
        $mosque = Mosque::first();
        $offset = (int) $request->query('offset', 3);

        [$items, $partial, $key] = match ($section) {
            'schedules' => [
                $mosque?->schedules()->orderBy('date')->skip($offset)->take(3)->get() ?? collect(),
                'components.public.partials.schedule-items',
                'schedules',
            ],
            'activities' => [
                $mosque?->activities()->latest('date')->skip($offset)->take(3)->get() ?? collect(),
                'components.public.partials.activity-items',
                'activities',
            ],
            'finances' => [
                $mosque?->finances()->latest('date')->skip($offset)->take(3)->get() ?? collect(),
                'components.public.partials.finance-rows',
                'finances',
            ],
            'articles' => [
                Article::whereNotNull('published_at')->where('published_at', '<=', now())->latest('published_at')->skip($offset)->take(3)->get(),
                'components.public.partials.article-items',
                'articles',
            ],
        };

        $hasMore = match ($section) {
            'schedules' => $mosque && $mosque->schedules()->orderBy('date')->skip($offset + 3)->limit(1)->exists(),
            'activities' => $mosque && $mosque->activities()->latest('date')->skip($offset + 3)->limit(1)->exists(),
            'finances' => $mosque && $mosque->finances()->latest('date')->skip($offset + 3)->limit(1)->exists(),
            'articles' => Article::whereNotNull('published_at')->where('published_at', '<=', now())->skip($offset + 3)->limit(1)->exists(),
        };

        return response(view($partial, [$key => $items])->render())
            ->header('X-Has-More', $hasMore ? '1' : '0');
    }

    public function blogIndex(Request $request): View|Response
    {
        $articles = Article::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(9);

        if ($request->ajax()) {
            return response(view('components.public.partials.blog-list-items', ['articles' => $articles])->render())
                ->header('X-Has-More', $articles->hasMorePages() ? '1' : '0');
        }

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

    public function scheduleIndex(Request $request): View|Response
    {
        $mosque = Mosque::first();
        $schedules = $mosque
            ? $mosque->schedules()->orderBy('date')->paginate(9)
            : Schedule::where('id', 0)->paginate(9);

        if ($request->ajax()) {
            return response(view('components.public.partials.schedule-items', ['schedules' => $schedules])->render())
                ->header('X-Has-More', $schedules->hasMorePages() ? '1' : '0');
        }

        return view('public.schedules.index', ['schedules' => $schedules]);
    }

    public function activityIndex(Request $request): View|Response
    {
        $mosque = Mosque::first();
        $activities = $mosque
            ? $mosque->activities()->latest('date')->paginate(9)
            : Activity::where('id', 0)->paginate(9);

        if ($request->ajax()) {
            return response(view('components.public.partials.activity-items', ['activities' => $activities])->render())
                ->header('X-Has-More', $activities->hasMorePages() ? '1' : '0');
        }

        return view('public.activities.index', ['activities' => $activities]);
    }

    public function announcementIndex(Request $request): View|Response
    {
        $mosque = Mosque::first();
        $announcements = $mosque
            ? $mosque->announcements()->orderByDesc('is_pinned')->latest('date')->paginate(9)
            : Announcement::where('id', 0)->paginate(9);

        if ($request->ajax()) {
            return response(view('components.public.partials.announcement-items', ['announcements' => $announcements])->render())
                ->header('X-Has-More', $announcements->hasMorePages() ? '1' : '0');
        }

        return view('public.announcements.index', ['announcements' => $announcements]);
    }

    public function financeIndex(Request $request): View|Response
    {
        $mosque = Mosque::first();
        $type = $request->query('type');
        $from = $request->query('from');
        $to = $request->query('to');
        if ($from && $to && $to < $from) {
            $to = null;
        }

        $query = $mosque ? $mosque->finances() : Finance::where('id', 0);
        $query
            ->when($type, fn ($q) => $q->where('type', $type))
            ->when($from, fn ($q) => $q->whereDate('date', '>=', $from))
            ->when($to, fn ($q) => $q->whereDate('date', '<=', $to));

        $finances = $query->latest('date')->paginate(9)->withQueryString();

        if ($request->ajax()) {
            return response(view('components.public.partials.finance-rows', ['finances' => $finances])->render())
                ->header('X-Has-More', $finances->hasMorePages() ? '1' : '0');
        }

        $totalsQuery = $mosque ? $mosque->finances() : Finance::where('id', 0);
        $financeTotals = $totalsQuery
            ->when($type, fn ($q) => $q->where('type', $type))
            ->when($from, fn ($q) => $q->whereDate('date', '>=', $from))
            ->when($to, fn ($q) => $q->whereDate('date', '<=', $to))
            ->selectRaw('type, sum(amount) as total')->groupBy('type')->pluck('total', 'type');

        return view('public.finances.index', [
            'finances' => $finances,
            'totalMasuk' => (float) ($financeTotals['masuk'] ?? 0),
            'totalKeluar' => (float) ($financeTotals['keluar'] ?? 0),
        ]);
    }
}
