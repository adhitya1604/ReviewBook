<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('books');
        
        // Filter berdasarkan judul A-Z atau Z-A
        if ($request->has('sort') && in_array($request->sort, ['asc', 'desc'])) {
            $query->orderBy('title', $request->sort);
        }
        
        // Filter berdasarkan genre
        if ($request->has('genre') && !empty($request->genre)) {
            $query->where('genre_id', $request->genre);
        }

        // Ambil data buku
        $books = $query->get();
        
        // Ambil daftar genre untuk dropdown
        $genres = DB::table('genres')->get();

        return view('book.tampil', compact('books', 'genres'));
    }

    public function create()
    {
        $genres = DB::table('genres')->get();
     return view('Book.tambah', ['genres' => $genres]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'stok' => 'required',
            'genre_id' => 'required'
        ]);
    
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
        }
    
        DB::table('books')->insert([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'image'=> $imageName,
            'stok'=> $request->input('stok'),
            'genre_id' => $request->input('genre_id'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    return redirect('/book')->with('success', 'Buku berhasil ditambahkan!');;
    }

    public function show($id)
    {
        $books = DB::table('books')->find($id);
        $genres = DB::table('genres')->where('id', $books->genre_id)->first();
        $comments = DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id') // Gabungkan dengan tabel users berdasarkan user_id
        ->where('comments.book_id', $books->id) // Filter berdasarkan book_id
        ->select('comments.*', 'users.name as user_name') // Pilih kolom dari comments dan nama pengguna
        ->get();

        return view('book.detail', compact('books', 'genres', 'comments'));
    }

    public function edit($id)
    {
        $books = DB::table('books')->find($id);
        $genres = DB::table('genres')->get();
 
        return view('Book.edit', compact('books', 'genres'));
    }

    public function update($id, Request $request)
    {
    $request->validate([
        'title' => 'required',
        'summary' => 'required',
        'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        'stok' => 'required',
        'genre_id' => 'required'
    ]);
    
    $book = DB::table('books')->where('id', $id)->first();
    $imageName = $book->image; // Jika tidak ada gambar baru, tetap gunakan gambar lama
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($imageName && file_exists(public_path('images/'.$imageName))) {
            unlink(public_path('images/'.$imageName));
        }

        // Simpan gambar baru
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    }
    $books = DB::table('books')
    
    ->where('id', $id)
    ->update(['title' => $request->input('title'),
              'summary'=>$request->input('summary'),
              'image' => $imageName,
            'stok' => $request->input('stok'),
            'genre_id' => $request->input('genre_id'),
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()]);

    return redirect('/book')->with('success', 'Buku berhasil diUpdate!');

    }

    public function destroy($id)
    {
        $genres = DB::table('books')->where('id', $id)->delete();
 
        return redirect('/book')->with('success', 'Buku berhasil diHAPUS!');;
    }


}
