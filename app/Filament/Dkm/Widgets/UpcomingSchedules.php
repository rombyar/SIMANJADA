<?php

namespace App\Filament\Dkm\Widgets;

use App\Models\Mosque;
use App\Models\Schedule;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UpcomingSchedules extends BaseWidget
{
    protected static ?string $heading = 'Jadwal Terdekat';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Schedule::query()
                    ->whereBelongsTo(Mosque::where('user_id', auth()->id())->first() ?? new Mosque())
                    ->where('date', '>=', today())
                    ->orderBy('date')
                    ->orderBy('time')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama'),
                Tables\Columns\TextColumn::make('place')->label('Tempat'),
                Tables\Columns\TextColumn::make('date')->label('Tanggal')->date('d F Y'),
                Tables\Columns\TextColumn::make('time')->label('Waktu'),
            ])
            ->paginated(false);
    }
}
