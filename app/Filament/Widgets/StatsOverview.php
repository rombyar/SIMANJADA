<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Mosque;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected static string $view = 'filament.widgets.stats-overview';

    protected function getStats(): array
    {
        $mosque = Mosque::first();

        if (! $mosque) {
            return [];
        }

        $saldo = $mosque->finances()->where('type', 'masuk')->sum('amount')
            - $mosque->finances()->where('type', 'keluar')->sum('amount');

        return [
            Stat::make('Jadwal Mendatang', $mosque->schedules()->where('date', '>=', today())->count())
                ->icon('heroicon-o-calendar')
                ->color('success'),
            Stat::make('Kegiatan Bulan Ini', $mosque->activities()->whereMonth('date', now()->month)->whereYear('date', now()->year)->count())
                ->icon('heroicon-o-clipboard-document-list')
                ->color('success'),
            Stat::make('Pengumuman Aktif', $mosque->announcements()->where('is_pinned', true)->count())
                ->icon('heroicon-o-megaphone')
                ->color('success'),
            Stat::make('Saldo Kas', 'Rp' . Number::format($saldo, locale: 'id'))
                ->icon('heroicon-o-banknotes')
                ->color('success'),
            Stat::make('Artikel Terbit', Article::whereNotNull('published_at')->count())
                ->icon('heroicon-o-newspaper')
                ->color('gray'),
        ];
    }
}
