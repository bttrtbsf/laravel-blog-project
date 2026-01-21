<?php

namespace App\Http\Controllers;
use App\Models\Gonderi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        $gonderiler = Gonderi::where('taslak',0)->latest()->get();
        
        return view('welcome',compact('gonderiler'));
    }
    public function show($id)
    {
        // 1. Yazıyı bul (Bulamazsa 404 hatası ver)
        $gonderi = Gonderi::findOrFail($id);

        // 2. Detay sayfasına gönder
        return view('show', compact('gonderi'));
    }
}
