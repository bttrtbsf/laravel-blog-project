<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gonderi extends Model
{
    use HasFactory;

    // 1. Tablo adını Laravel'e öğret (Çünkü İngilizce değil)
    protected $table = 'gonderiler';
    protected $primaryKey = 'id';

    // 2. Toplu eklemeye izin verilen alanlar (Sequelize model definition gibi)
    protected $fillable = ['baslik', 'icerik', 'taslak', 'kullanici_id','resim','kategori_id'];

    // İLİŞKİLER

    // Gönderi -> Kullanıcı (Tersi)
    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id', 'id');
    }

    // Gönderi -> Yorumlar (One to Many)
    public function yorumlar()
    {
        return $this->hasMany(Yorum::class, 'gonderi_id', 'id');
    }

    // Gönderi -> Kategoriler (Many to Many / Çoka Çok)
    // Pivot tablo adını ve anahtarları belirtmeliyiz
    public function kategoriler()
    {
        return $this->belongsToMany(
            Kategori::class, 
            'gonderi_kategori', // Pivot tablo adı
            'gonderi_id',       // Bu modelin pivot tablodaki key'i
            'kategori_id'       // Karşı modelin pivot tablodaki key'i
        );
    }

    // Gönderi -> Etiketler (Many to Many)
    public function etiketler()
    {
        return $this->belongsToMany(Etiket::class, 'gonderi_etiket', 'gonderi_id', 'etiket_id');
    }   
    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
