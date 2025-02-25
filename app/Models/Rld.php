<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function decaissements(): HasMany
    {
        return $this->hasMany(Decaissement::class);
    }

    public function getMontantEngageAttribute()
    {
        return $this->decaissements()->sum('montant');
    }

    public function ptba(): BelongsTo
    {
        return $this->belongsTo(Ptba::class);
    }

    public function getResteAttribute()
    {
        return $this->montant - $this->montantEngage;
    }
}
