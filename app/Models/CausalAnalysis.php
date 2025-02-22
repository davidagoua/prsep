<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CausalAnalysis extends Model
{
    protected $guarded = [];

    public function central_issue(): BelongsTo
    {
        return $this->belongsTo(CentralIssue::class);
    }
}
