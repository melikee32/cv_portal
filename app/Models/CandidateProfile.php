<?php

namespace App\Models;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Education;

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
        'profile_completion_rate',
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

    // 🎓 Adayın eğitim bilgileri
    public function educations(): HasMany
    {
        return $this->hasMany(Education::class, 'candidate_id');
    }

    // 💼 Adayın iş deneyimleri
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class, 'candidate_id');
    }

    // 🛠️ Adayın yetenekleri
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class, 'candidate_id');
    }

    // 📜 Adayın sertifikaları
    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class, 'candidate_id');
    }
}
