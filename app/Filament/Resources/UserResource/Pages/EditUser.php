<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (
            $this->record->id === auth()->id()
            && $data['role'] !== UserRole::SuperAdmin->value
        ) {
            Notification::make()
                ->title('Tidak bisa mengubah role akun sendiri menjadi selain Super Admin.')
                ->danger()
                ->send();

            $this->halt();
        }

        return $data;
    }
}
