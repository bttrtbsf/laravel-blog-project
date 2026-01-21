<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gonderi;

class DashboardController extends Controller
{
    public function index(){
        $toplamYazi = Gonderi::count();
        $yayindakiYazi = Gonderi::where('taslak', 0)->count();
        $taslakYazi = Gonderi::where('taslak', 1)->count();

        $sonYazi = Gonderi::latest()->first();
        return view('dashboard', compact('toplamYazi', 'yayindakiYazi', 'taslakYazi', 'sonYazi'));
    }
}
