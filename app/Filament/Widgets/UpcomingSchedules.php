<?php

namespace App\Filament\Widgets;

use App\Models\Mosque;
use App\Models\Schedule;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UpcomingSchedules extends BaseWidget
{
    protected static ?string $heading = 'Jadwal Terdekat';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Schedule::query()
                    ->whereBelongsTo(Mosque::first() ?? new Mosque())
                    ->where('date', '>=', today())
                    ->orderBy('date')
                    ->orderBy('time')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('place'),
                Tables\Columns\TextColumn::make('date')->date('d F Y'),
                Tables\Columns\TextColumn::make('time'),
            ])
            ->paginated(false);
    }
}
