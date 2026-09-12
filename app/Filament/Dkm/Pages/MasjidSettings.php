<?php

namespace App\Filament\Dkm\Pages;

use App\Models\Masjid;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class MasjidSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Data Masjid';

    protected static ?string $title = 'Data Masjid';

    protected static string $view = 'filament.dkm.pages.masjid-settings';

    public ?array $data = [];

    public Masjid $record;

    public function mount(): void
    {
        $this->record = Masjid::firstOrNew(['user_id' => auth()->id()]);

        $this->form->fill($this->record->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required(),
                TextInput::make('tahun_berdiri')->required(),
                Textarea::make('alamat')->required(),
                TextInput::make('jenis')->required(),
                TextInput::make('status_tanah')->required(),
                Textarea::make('deskripsi')->required(),
                TextInput::make('nomor_telepon'),
                FileUpload::make('image')->image()->directory('masjids'),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save(): void
    {
        $this->record->fill($this->form->getState());
        $this->record->user_id = auth()->id();
        $this->record->save();

        Notification::make()
            ->title('Data masjid berhasil disimpan')
            ->success()
            ->send();
    }
}
