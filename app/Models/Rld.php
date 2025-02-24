<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rld extends Model
{
    protected $guarded = [];

    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class);
    }

    public function ild(): BelongsTo
    {
        return $this->belongsTo(Ild::class);
    }

    public function ptba(): BelongsTo
    {
        return $this->belongsTo(Ptba::class);
    }
}
