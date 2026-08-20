<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'logo',
        'description',
        'industry',
        'city',
        'address',
        'website',
        'instagram',
        'linkedin',
        'x',
    ];

    // Bu firma hangi kullanıcıya (employer) ait
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}