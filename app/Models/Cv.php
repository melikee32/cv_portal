<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = ['candidate_id', 'title', 'template', 'is_public', 'share_token'];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    public function candidate()
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_id');
    }
}