<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Yorum extends Model
{
    
    protected $table = 'yorumlar';
    protected $fillable = ['icerik', 'kullanici_id', 'gonderi_id'];

    public function kullanici()
    {
        return $this->belongsTo(User::class, 'kullanici_id');
    }

    public function gonderi()
    {
        return $this->belongsTo(Gonderi::class, 'gonderi_id');
    }
}
