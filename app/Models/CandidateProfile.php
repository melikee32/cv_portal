<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateProfile extends Model
{
    protected $fillable = [
        'user_id',
        'profile_photo',
        'phone',
        'birth_date',
        'about',
        'city',
        'country',
        'github_url',
        'linkedin_url',
        'portfolio_url',
        'is_public',
        'profile_completion',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_public' => 'boolean',
    ];

    // 👤 Profilin sahibi
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}