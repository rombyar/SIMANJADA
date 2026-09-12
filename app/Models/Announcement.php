<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['mosque_id', 'title', 'content', 'date', 'is_pinned'])]
class Announcement extends Model
{
    protected $table = 'mjd_announcements';

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'is_pinned' => 'boolean',
        ];
    }

    public function mosque(): BelongsTo
    {
        return $this->belongsTo(Mosque::class);
    }
}
