<?php

namespace App\Filament\Dkm\Widgets;

use App\Models\Mosque;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $mosque = Mosque::where('user_id', auth()->id())->first();

        if (! $mosque) {
            return [];
        }

        $saldo = $mosque->finances()->where('type', 'masuk')->sum('amount')
            - $mosque->finances()->where('type', 'keluar')->sum('amount');

        return [
            Stat::make('Jadwal Mendatang', $mosque->schedules()->where('date', '>=', today())->count()),
            Stat::make('Kegiatan Bulan Ini', $mosque->activities()->whereMonth('date', now()->month)->whereYear('date', now()->year)->count()),
            Stat::make('Pengumuman Aktif', $mosque->announcements()->where('is_pinned', true)->count()),
            Stat::make('Saldo Kas', 'Rp' . Number::format($saldo, locale: 'id')),
        ];
    }
}
