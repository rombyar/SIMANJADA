<?php

namespace App\Filament\Dkm\Resources;

use App\Filament\Dkm\Resources\KegiatanResource\Pages;
use App\Models\Kegiatan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('masjid', fn (Builder $query) => $query->where('user_id', auth()->id()));
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('masjid_id')
                ->relationship(
                    name: 'masjid',
                    titleAttribute: 'nama',
                    modifyQueryUsing: fn (Builder $query) => $query->where('user_id', auth()->id()),
                )
                ->required(),
            TextInput::make('judul')->required(),
            Textarea::make('deskripsi')->required(),
            DatePicker::make('tanggal')->required(),
            FileUpload::make('image')->image()->directory('kegiatans'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->searchable(),
                TextColumn::make('masjid.nama'),
                TextColumn::make('tanggal')->date(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
