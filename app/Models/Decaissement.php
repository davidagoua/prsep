<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Decaissement extends Model
{
    protected $guarded = [];
    public function rld(): BelongsTo
    {
        return $this->belongsTo(Rld::class);
    }

    public function ptba(): BelongsTo
    {
        return $this->belongsTo(Ptba::class);
    }
}
