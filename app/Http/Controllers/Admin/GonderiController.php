<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Gonderi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;

use function Ramsey\Uuid\v1;

class GonderiController extends Controller
{
    /**
     * Gönderileri Listele
     */
    public function index()
    {
        // En yeniden eskiye doğru sırala (latest)
        $gonderiler = Gonderi::latest()->get();

        return view('admin.gonderiler.index', compact('gonderiler'));
    }

    /**
     * Yeni Ekleme Formunu Göster
     */
    public function create()
    {
        $kategoriler = Kategori::all();
        return view('admin.gonderiler.create',compact('kategoriler'));
    }

    /**
     * Veriyi Kaydet
     */
    public function store(Request $request)
    {
        // 1. Validasyon
       $data = $request->validate([
            'baslik' => 'required|max:255',
            'icerik' => 'required',
            'taslak' => 'required|boolean',
            'resim'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori_id' => 'required|exists:kategoriler,id',
        ]);
        if($request->hasFile('resim')){
            $dosyaYolu = $request->file('resim')->store('gonderiler','public');
            $data['resim'] = $dosyaYolu;
        }
        $data['kullanici_id'] = $request->user()->id;   
        // 2. Kayıt
        Gonderi::create($data);

        // 3. Yönlendirme
        return redirect()->route('admin.gonderiler.index')
                        ->with('success', 'Gönderi başarıyla oluşturuldu!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gonderi = Gonderi::findOrFail($id);
        $kategoriler = Kategori::all();
        return view('admin.gonderiler.edit', compact('gonderi','kategoriler'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'baslik' => 'required | max:255',
            'icerik' => 'required',
            'taslak' => 'required | boolean',
            'kategori_id' => 'required|exists:kategoriler,id',
        ]);
        $gonderi = Gonderi::findOrFail($id);
        $gonderi->update([
            'baslik' => $request->baslik,
            'icerik' => $request->icerik,
            'taslak' => $request->taslak,
            'kategori_id' => $request->kategori_id
        ]);
        return redirect()->route('admin.gonderiler.index')
            ->with('success','Gönderi Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $gonderi = Gonderi::findOrFail($id);
        $gonderi->delete();
        return redirect()->route('admin.gonderiler.index')
                        ->with('success', 'Gönderi başarıyla silindi.');
    }
}
