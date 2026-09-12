<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MosqueType: string implements HasLabel
{
    case Jami = 'Masjid JAMI';
    case Raya = 'Masjid Raya';
    case Mushola = 'Mushola';

    public function getLabel(): string
    {
        return match ($this) {
            self::Jami => 'Masjid Jami',
            self::Raya => 'Masjid Raya',
            self::Mushola => 'Mushola',
        };
    }
}
