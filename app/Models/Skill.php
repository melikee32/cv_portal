<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    protected $fillable = [
        'candidate_id',
        'name',
        'level',
        'category',
    ];

    public function candidateProfile(): BelongsTo
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_id');
    }
}