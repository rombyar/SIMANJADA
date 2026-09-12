<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('judul')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function (string $operation, $state, callable $set, $get) {
                    if ($operation === 'create' && blank($get('slug'))) {
                        $set('slug', Str::slug($state));
                    }
                }),
            TextInput::make('slug')->required()->unique(ignoreRecord: true),
            RichEditor::make('konten')->required()->columnSpanFull(),
            FileUpload::make('image')->image()->directory('articles'),
            DateTimePicker::make('published_at')
                ->helperText('Kosongkan untuk simpan sebagai draft.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->searchable(),
                IconColumn::make('published_at')->boolean()->getStateUsing(fn (Article $record) => filled($record->published_at))->label('Published'),
                TextColumn::make('published_at')->dateTime(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
