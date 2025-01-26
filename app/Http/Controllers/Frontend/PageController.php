<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function home() {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    function vehicles() 
    {
        return view('vehicles');
    }

    function about() 
    {
        return view('about');
    }

    function contact() 
    {
        return view('contact');
    }
}
