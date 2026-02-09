<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriler = Kategori::latest()->get();
        return view('admin.kategoriler.index', compact('kategoriler'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategoriler.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isim' => 'required|max:255',
            'acıklama' => 'nullable|max:500'
        ]);
        Kategori::create($request->all());
        return redirect()->route('admin.kategoriler.index')->with('success', 'Kategori oluşturuldu.');
   }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategoriler.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'isim' => 'required|max:255',
            'acıklama' => 'nullable|max:500',
        ]);
        $kategori->update($request->all());
        return redirect()->route('admin.kategoriler.index')->with('success', 'Kategori Güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategoriler.index')->with('success', 'Kategori silindi.');
    }
}
