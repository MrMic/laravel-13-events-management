<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(["name", "description", "start_time", "end_time", "user_id"])]
class Event extends Model
{
    use HasFactory;

    // ______________________________________________________________________
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ______________________________________________________________________
    public function attendees(): HasMany
    {
        return $this->hasMany(Attendee::class);
    }
}
