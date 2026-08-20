<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';


    protected $fillable = [
        'candidate_id',
        'school_name',
        'department',
        'degree',
        'start_date',
        'end_date',
        'is_current',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'is_current' => 'boolean',
        ];
    }

    public function candidate()
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_id');
    }
}
