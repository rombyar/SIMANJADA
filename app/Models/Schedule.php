<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['mosque_id', 'name', 'description', 'place', 'date', 'time'])]
class Schedule extends Model
{
    protected $table = 'mjd_schedules';

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
