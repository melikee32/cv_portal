<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    // Veritabanına toplu olarak yazılmasına izin verilen alanlar.
    protected $fillable = [
        'candidate_id',
        'company_name',
        'position',
        'start_date',
        'end_date',
        'is_current',
        'description',
    ];

    // Deneyimin bağlı olduğu aday profili.
    public function candidateProfile(): BelongsTo
    {
        return $this->belongsTo(
            CandidateProfile::class,
            'candidate_id'
        );
    }

    // Tarih ve boolean alanlarını uygun tipe dönüştürür.
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date'   => 'date',
            'is_current' => 'boolean',
        ];
    }
}