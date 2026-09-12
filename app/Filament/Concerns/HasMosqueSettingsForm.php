<?php

namespace App\Filament\Concerns;

use App\Enums\LandStatus;
use App\Enums\MosqueType;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

trait HasMosqueSettingsForm
{
    protected function generalInfoSchema(): array
    {
        return [
            TextInput::make('name')->required(),
            TextInput::make('founding_year')
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue((int) date('Y')),
            Select::make('type')->options(MosqueType::class)->required(),
            Select::make('land_status')->options(LandStatus::class)->required(),
        ];
    }

    protected function addressContactSchema(): array
    {
        return [
            Textarea::make('address')->required(),
            TextInput::make('phone_number')->tel(),
            TextInput::make('map_url')->url()->label('Link Peta (mis. OpenStreetMap)'),
        ];
    }

    protected function descriptionMediaSchema(): array
    {
        return [
            Textarea::make('description')->required(),
            FileUpload::make('image')->image()->directory('mosques')->maxSize(2048),
        ];
    }
}
