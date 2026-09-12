<?php

namespace App\Filament\Dkm\Resources;

use App\Filament\Dkm\Resources\FinanceResource\Pages;
use App\Models\Finance;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FinanceResource extends Resource
{
    protected static ?string $model = Finance::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Transparansi';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('mosque', fn (Builder $query) => $query->where('user_id', auth()->id()));
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('mosque_id')
                ->relationship(
                    name: 'mosque',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn (Builder $query) => $query->where('user_id', auth()->id()),
                )
                ->required(),
            DatePicker::make('date')->required(),
            Select::make('type')
                ->options(['masuk' => 'Pemasukan', 'keluar' => 'Pengeluaran'])
                ->required(),
            TextInput::make('amount')->numeric()->prefix('Rp')->required(),
            TextInput::make('notes')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->date(),
                TextColumn::make('mosque.name'),
                TextColumn::make('type')->badge()->color(fn (string $state) => $state === 'masuk' ? 'success' : 'danger'),
                TextColumn::make('amount')->money('IDR'),
                TextColumn::make('notes')->limit(40),
            ])
            ->defaultSort('date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFinances::route('/'),
            'create' => Pages\CreateFinance::route('/create'),
            'edit' => Pages\EditFinance::route('/{record}/edit'),
        ];
    }
}
