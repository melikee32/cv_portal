<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPUnit\TextUI\Application;

class User extends Authenticatable
{

    use HasFactory, Notifiable;

    // Kullanıcının hangi alanlarının User::create() ile doldurulabileceğini belirler.
    protected $filliable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Şifrenin response/JSON gibi çıktılarda görünmesini engeller.
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Veritabanından gelen alanların uygun PHP tiplerine dönüştürülmesini sağlar.
    protected function casts(): array{
        return [
            'email_verified_at' => 'datetime',
            //'password' => 'hashed', //Laravel'e verilen düz şifre otomatik olarak hashlenebilir ama controlerde yapacagız
        ];
    }

    // Bir kullanıcının bir aday profili olabilir.
    public function candidateProfile(){
        return $this -> hasOne(candidateProfile::class);
    }

    // Bir adayın birden fazla CV'si olabilir.
    public function cvs(){
        return $this -> hasMany(Cv::class, 'candidate_id');
    }

    // Bir aday birçok iş ilanına başurabilir.
    public function applications(){
        return $this -> hasMany(Application::class, 'candidate_id');
    }

    // Kullanıcı birçok Bidirim alabilir.
    public function notifications() {
        return $this -> hasMany(Notification::class);   
    }

    //işverenin bir firması olabilir.
    public function company(){
        return $this ->hasOne(Company::class);
    }


    













}
