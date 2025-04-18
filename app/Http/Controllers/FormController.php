<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register()
   {
    return view('Auth.register');
   }

   public function welcome(Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $full_name = $first_name . ' ' . $last_name;

        return view('welcome', ['name' => $full_name]);
    }
}
