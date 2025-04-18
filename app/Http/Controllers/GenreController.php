<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class GenreController extends Controller
{
    public function index()
    {
        $genres = DB::table('genres')->get();
 
        return view('Genre.tampil', ['genres' => $genres]);
    }

    public function create()
    {
     return view('Genre.tambah');
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|min:5',
        'description' => 'required',
    ]);

    DB::table('genres')->insert([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ]);

    return redirect('/genre');
    }

    public function show($id)
    {
        $genres = DB::table('genres')->find($id);
 
        return view('Genre.detail', ['genres' => $genres]);
    }

    public function edit($id)
    {
        $genres = DB::table('genres')->find($id);
 
        return view('Genre.edit', ['genres' => $genres]);
    }

    public function update($id, Request $request)
    {
    $request->validate([
        'name' => 'required|min:5',
        'description' => 'required',
    ]);
    
    $genres = DB::table('genres')
    ->where('id', $id)
    ->update(['name' => $request->input('name'),
              'description'=>$request->input('description'),
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()]);

    return redirect('/genre');

    }

    public function destroy($id)
    {
        $genres = DB::table('genres')->where('id', $id)->delete();
 
        return redirect('/genre');
    }


}
