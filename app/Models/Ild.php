<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ild extends Model
{
    protected $guarded = [];

    public function rlds(): HasMany
    {
        return $this->hasMany(Rld::class);
    }

    public function ptba(): BelongsTo
    {
        return $this->belongsTo(Ptba::class);
    }
}
