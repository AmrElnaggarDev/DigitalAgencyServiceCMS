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

    public function projects()
    {
        return view('front.projects');
    }

    public function project ($id)
    {
        return view('front.project', compact('id'));
    }

    public function team_members()
    {
        return view('front.team_members');
    }

    public function team_member($id)
    {
        return view('front.team_member', compact('id'));
    }

    public function faq ()
    {
        return view('front.faq');
    }

    public function blog()
    {
        return view('front.blog');
    }

    public function post($id)
    {
        return view('front.post', compact('id'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function photo_gallery()
    {
        return view('front.photo_gallery');
    }

    public function terms()
    {
        return view('front.terms');
    }

    public function privacy()
    {
        return view('front.privacy');
    }


}
