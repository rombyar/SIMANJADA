<?php

namespace App\Filament\Dkm\Pages;

use App\Filament\Concerns\HasMosqueSettingsForm;
use App\Models\Mosque;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class MosqueSettings extends Page implements HasForms
{
    use HasMosqueSettingsForm;
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Data Masjid';

    protected static ?string $title = 'Data Masjid';

    protected static string $view = 'filament.dkm.pages.mosque-settings';

    public ?array $dataGeneral = [];

    public ?array $dataAddress = [];

    public ?array $dataDescription = [];

    public Mosque $record;

    public function mount(): void
    {
        $this->record = Mosque::firstOrNew(['user_id' => auth()->id()]);

        $this->formGeneral->fill($this->record->toArray());
        $this->formAddress->fill($this->record->toArray());
        $this->formDescription->fill($this->record->toArray());
    }

    protected function getForms(): array
    {
        return [
            'formGeneral',
            'formAddress',
            'formDescription',
        ];
    }

    public function formGeneral(Form $form): Form
    {
        return $form
            ->schema($this->generalInfoSchema())
            ->statePath('dataGeneral')
            ->model($this->record);
    }

    public function formAddress(Form $form): Form
    {
        return $form
            ->schema($this->addressContactSchema())
            ->statePath('dataAddress')
            ->model($this->record);
    }

    public function formDescription(Form $form): Form
    {
        return $form
            ->schema($this->descriptionMediaSchema())
            ->statePath('dataDescription')
            ->model($this->record);
    }

    public function saveGeneral(): void
    {
        $this->record->fill($this->formGeneral->getState());
        $this->record->user_id = auth()->id();
        $this->record->save();

        Notification::make()
            ->title('Informasi umum berhasil disimpan')
            ->success()
            ->send();
    }

    public function saveAddress(): void
    {
        $this->record->fill($this->formAddress->getState());
        $this->record->user_id = auth()->id();
        $this->record->save();

        Notification::make()
            ->title('Alamat & kontak berhasil disimpan')
            ->success()
            ->send();
    }

    public function saveDescription(): void
    {
        $this->record->fill($this->formDescription->getState());
        $this->record->user_id = auth()->id();
        $this->record->save();

        Notification::make()
            ->title('Deskripsi & foto berhasil disimpan')
            ->success()
            ->send();
    }
}
