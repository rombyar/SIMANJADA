<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum LandStatus: string implements HasLabel
{
    case Wakaf = 'Wakaf';
    case MilikSendiri = 'Milik Sendiri';
    case Hibah = 'Hibah';
    case Sewa = 'Sewa';

    public function getLabel(): string
    {
        return $this->value;
    }
}
