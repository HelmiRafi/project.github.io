<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
    {
        $data = array(
            'title' => 'home page'
        );
        return view('home',$data);
    }
   
}
