<?php

namespace App\Filament\Dkm\Resources\FinanceResource\Pages;

use App\Filament\Dkm\Resources\FinanceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFinances extends ListRecords
{
    protected static string $resource = FinanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
