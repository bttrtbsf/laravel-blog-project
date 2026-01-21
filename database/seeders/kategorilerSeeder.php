<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Illuminate\Support\Str;

class kategorilerSeeder extends Seeder
{
    public function run()
    {
        $kategoriler = ['Teknoloji', 'Spor', 'Sağlık', 'Yazılım', 'Gezi', 'Sinema', 'Finans'];

        foreach ($kategoriler as $kat) {
            Kategori::firstOrCreate([
                'isim' => $kat
            ], [
                'slug' => Str::slug($kat)
            ]);
        }
    }
}
