<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'ad' => ['required', 'string', 'max:255'],
            'soyad' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'], // Admin, yazar vb. seçimi
        ]);

        User::create([
            'ad' => $request->ad,
            'soyad' => $request->soyad,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Şifreyi şifrele!
            'rol' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Kullanıcı oluşturuldu.');
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
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'ad' => ['required', 'string', 'max:255'],
            'soyad' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id], // Kendi emaili hariç kontrol et
            'role' => ['required'],
        ]);

        // Verileri güncelle
        $user->ad = $request->ad;
        $user->soyad = $request->soyad;
        $user->email = $request->email;
        $user->rol = $request->role;

        // Eğer şifre alanı boş değilse şifreyi de güncelle
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['confirmed', Rules\Password::defaults()]
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Kullanıcı güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success','Kullanıcı silindi');
    }
}
