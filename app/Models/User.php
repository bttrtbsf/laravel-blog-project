<?php

namespace App\Models;
use App\Models\Gonderi;
use App\Models\Yorum;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // Migration dosyamızdaki sütunlara göre güncelledik
    protected $fillable = [
        'ad',      // 'name' yerine senin tablandaki 'ad'
        'soyad',   // 'soyad' eklendi
        'email',
        'password',
        'rol',     // 'rol' eklendi (admin/user ayrımı için)
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /* -------------------------------------------------------------------------- */
    /* İLİŞKİLER (RELATIONS)                        */
    /* -------------------------------------------------------------------------- */

    // Bir kullanıcının birden fazla gönderisi olabilir
    public function gonderiler()
    {
        // hasMany(BağlanacakModel, 'karşıdaki_foreign_key', 'benim_local_keyim')
        return $this->hasMany(Gonderi::class, 'kullanici_id', 'id');
    }

    // Bir kullanıcının birden fazla yorumu olabilir
    public function yorumlar()
    {
        return $this->hasMany(Yorum::class, 'kullanici_id', 'id');
    }
    
    // Opsiyonel: Laravel bazen ekranda $user->name arar.
    // Senin tablonda 'name' yok, 'ad' ve 'soyad' var.
    // Bu kod $user->name çağrıldığında ad ve soyadı birleştirip verir.
    public function getNameAttribute()
    {
        return $this->ad . ' ' . $this->soyad;
    }
}