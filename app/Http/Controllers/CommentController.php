<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'content' => 'required|string|max:1000',
            'book_id' => 'required|exists:books,id',
        ]);

        
        DB::table('comments')->insert([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        
        return redirect("/book/{$request->book_id}");

    }
}
