<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoriler'; // Tablo adı
    protected $fillable = ['isim', 'aciklama'];
    public $timestamps = false; // Senin SQL'de created_at yoktu, Laravel aramasın diye kapatıyoruz.

    // Bir kategoriye ait gönderileri çekmek için
    public function gonderiler()
    {
        return $this->belongsToMany(Gonderi::class, 'gonderi_kategori', 'kategori_id', 'gonderi_id');
    }
}
