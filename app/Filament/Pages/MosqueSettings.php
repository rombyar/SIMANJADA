<?php

namespace App\Filament\Pages;

use App\Enums\UserRole;
use App\Models\Mosque;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class MosqueSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Setting Masjid';

    protected static ?string $title = 'Setting Data Masjid';

    protected static string $view = 'filament.pages.mosque-settings';

    public ?array $data = [];

    public Mosque $record;

    public function mount(): void
    {
        $this->record = Mosque::first() ?? new Mosque();

        $this->form->fill($this->record->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('founding_year')->required(),
                Textarea::make('address')->required(),
                TextInput::make('type')->required(),
                TextInput::make('land_status')->required(),
                Textarea::make('description')->required(),
                TextInput::make('phone_number'),
                FileUpload::make('image')->image()->directory('mosques'),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save(): void
    {
        $this->record->fill($this->form->getState());
        $this->record->user_id ??= User::where('role', UserRole::Dkm)->value('id');
        $this->record->save();

        Notification::make()
            ->title('Data masjid berhasil disimpan')
            ->success()
            ->send();
    }
}
