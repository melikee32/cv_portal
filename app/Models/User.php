<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // // 👤 Aday profili
    // public function candidateProfile()
    // {
    //     return $this->hasOne(CandidateProfile::class);
    // }

    // // 📄 CV'ler
    // public function cvs()
    // {
    //     return $this->hasMany(Cv::class);
    // }

    // // 🎓 Eğitimler
    // public function educations()
    // {
    //     return $this->hasMany(Education::class);
    // }

    // // 💼 Deneyimler
    // public function experiences()
    // {
    //     return $this->hasMany(Experience::class);
    // }

    // // 🛠️ Yetenekler
    // public function skills()
    // {
    //     return $this->hasMany(Skill::class);
    // }

    // // 🏆 Sertifikalar
    // public function certificates()
    // {
    //     return $this->hasMany(Certificate::class);
    // }

    // // 📚 Kurslar
    // public function courses()
    // {
    //     return $this->hasMany(Course::class);
    // }

    // // 🌐 Diller
    // public function languages()
    // {
    //     return $this->hasMany(Language::class);
    // }

    // // 🚀 Projeler
    // public function projects()
    // {
    //     return $this->hasMany(Project::class);
    // }

    // // 👥 Referanslar
    // public function candidateReferences()
    // {
    //     return $this->hasMany(CandidateReference::class);
    // }

    // // 🏢 Firmalar
    // public function companies()
    // {
    //     return $this->hasMany(Company::class);
    // }

    // // 📩 Başvurular
    // public function applications()
    // {
    //     return $this->hasMany(Application::class);
    // }

    // // ⭐ Favoriler
    // public function favorites()
    // {
    //     return $this->hasMany(Favorite::class);
    // }

    // // ❤️ Firma takipleri
    // public function companyFollowers()
    // {
    //     return $this->hasMany(CompanyFollower::class);
    // }

    // // 🔔 Bildirimler
    // public function notifications()
    // {
    //     return $this->hasMany(Notification::class);
    // }
}