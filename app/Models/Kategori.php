<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoriler';

    protected $fillable = [
        'isim',
        'aciklama'
    ];
    public function gonderiler()
    {   
        return $this->hasMany(Gonderi::class, 'kategori_id'); 
    }
}