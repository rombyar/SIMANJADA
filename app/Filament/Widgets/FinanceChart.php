<?php

namespace App\Filament\Widgets;

use App\Models\Mosque;
use Filament\Widgets\ChartWidget;

class FinanceChart extends ChartWidget
{
    protected static ?string $heading = 'Tren Keuangan (6 Bulan Terakhir)';

    protected static ?int $sort = 2;

    protected function getHeight(): ?string
    {
        return '250px';
    }

    protected function getMosque(): ?Mosque
    {
        return Mosque::first();
    }

    protected function getData(): array
    {
        $mosque = $this->getMosque();

        $months = collect(range(5, 0))->map(fn ($i) => now()->subMonths($i)->startOfMonth());

        $rows = $mosque
            ? $mosque->finances()
                ->whereBetween('date', [now()->subMonths(5)->startOfMonth(), now()->endOfMonth()])
                ->get()
                ->groupBy(fn ($finance) => $finance->date->format('Y-m'))
            : collect();

        $sumFor = fn ($month, $type) => $rows->get($month->format('Y-m'), collect())
            ->where('type', $type)->sum('amount');

        return [
            'datasets' => [
                [
                    'label' => 'Pemasukan',
                    'data' => $months->map(fn ($month) => $sumFor($month, 'masuk'))->all(),
                    'borderColor' => '#059669',
                    'backgroundColor' => '#059669',
                ],
                [
                    'label' => 'Pengeluaran',
                    'data' => $months->map(fn ($month) => $sumFor($month, 'keluar'))->all(),
                    'borderColor' => '#dc2626',
                    'backgroundColor' => '#dc2626',
                ],
            ],
            'labels' => $months->map(fn ($month) => $month->translatedFormat('M Y'))->all(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
