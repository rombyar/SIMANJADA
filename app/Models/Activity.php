<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['mosque_id', 'title', 'description', 'date', 'image'])]
class Activity extends Model
{
    protected $table = 'mjd_activities';

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function mosque(): BelongsTo
    {
        return $this->belongsTo(Mosque::class);
    }
}
