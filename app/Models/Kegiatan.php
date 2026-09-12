<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['masjid_id', 'judul', 'deskripsi', 'tanggal', 'image'])]
class Kegiatan extends Model
{
    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    public function masjid(): BelongsTo
    {
        return $this->belongsTo(Masjid::class);
    }
}
