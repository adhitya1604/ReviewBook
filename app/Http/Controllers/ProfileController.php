<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
{
    $user = Auth::user(); 
    $profile = DB::table('profile')->where('user_id', $user->id)->first();

    if (!$profile) {
        return redirect()->route('profile.create')->with('error', 'Profil tidak ditemukan, silakan tambahkan profil terlebih dahulu.');
    }

    return view('profile.tampil', compact('profile'));
}


    // Menampilkan form untuk edit profil
    public function edit()
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login

        // Mengambil data profil pengguna untuk ditampilkan di form edit
        $profile = DB::table('profile')->where('user_id', $user->id)->first();

        return view('profile.edit', compact('profile'));
    }

    // Menyimpan perubahan profil
    public function update(Request $request)
    {
        $request->validate([
            'age' => 'required|integer',
            'address' => 'required|string|max:255',
        ]);

        $user = Auth::user(); // Mendapatkan user yang sedang login

        // Mengupdate data profil menggunakan DB Facade
        DB::table('profile')
            ->where('user_id', $user->id)
            ->update([
                'age' => $request->age,
                'address' => $request->address,
                'updated_at' => now(),
            ]);

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }

    // Menampilkan form untuk tambah profil
    public function create()
    {
        return view('profile.tambah');
    }

    // Menyimpan profil baru
    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required|integer',
            'address' => 'required|string|max:255',
        ]);

        // Menyimpan data profil pengguna baru
        DB::table('profile')->insert([
            'age' => $request->age,
            'address' => $request->address,
            'user_id' => Auth::id(), // Mendapatkan ID pengguna yang sedang login
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('profile.show')->with('success', 'Profil berhasil ditambahkan!');
    }
}
