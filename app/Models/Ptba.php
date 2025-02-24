<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ptba extends Model
{
    protected $guarded = [];

    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class);
    }

    public function getMontantRldAttribute()
    {
        return Rld::query()->where('ptba_id', $this->id)->sum('montant');
    }
}
