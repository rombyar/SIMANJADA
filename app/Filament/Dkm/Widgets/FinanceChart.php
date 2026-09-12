<?php

namespace App\Filament\Dkm\Widgets;

use App\Models\Mosque;
use Filament\Widgets\ChartWidget;

class FinanceChart extends ChartWidget
{
    protected static ?string $heading = 'Tren Keuangan (6 Bulan Terakhir)';

    protected int | string | array $columnSpan = 'full';

    protected function getMosque(): ?Mosque
    {
        return Mosque::where('user_id', auth()->id())->first();
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
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.6)',
                    'borderRadius' => 6,
                    'maxBarThickness' => 28,
                ],
                [
                    'label' => 'Pengeluaran',
                    'data' => $months->map(fn ($month) => $sumFor($month, 'keluar'))->all(),
                    'borderColor' => '#f43f5e',
                    'backgroundColor' => 'rgba(244, 63, 94, 0.6)',
                    'borderRadius' => 6,
                    'maxBarThickness' => 28,
                ],
            ],
            'labels' => $months->map(fn ($month) => $month->translatedFormat('M Y'))->all(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getMaxHeight(): ?string
    {
        return '220px';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'labels' => [
                        'boxWidth' => 10,
                        'boxHeight' => 10,
                    ],
                ],
            ],
            'scales' => [
                'x' => ['grid' => ['display' => false]],
                'y' => ['grid' => ['color' => 'rgba(148, 163, 184, 0.1)']],
            ],
        ];
    }
}
