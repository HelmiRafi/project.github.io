<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuntController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginStore(Request $request)
    {
        $data = $request->validate([
            'email'     =>'required|email',
            'password'  => 'required'
        ]);

        if (Auth::attempt($data)){
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->with('error','email atau Password salah!');
        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
        
    
    
}
