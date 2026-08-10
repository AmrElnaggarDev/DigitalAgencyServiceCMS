<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index ()
    {
        return view('front.home');
    }

    public function about()
    {
        return view('front.about');
    }

    public function services()
    {
        return view('front.services');
    }

    public function service($id)
    {
        return view('front.service', compact('id'));
    }

    public function pricing()
    {
        return view('front.pricing');
    }
}
