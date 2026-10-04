<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutItem;
use App\Models\CounterItem;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index ()
    {
        $sliders = Slider::orderBy('id','asc')->get();
        $about_item = AboutItem::where ('id', 1)->first();
        $counter_item = CounterItem::where ('id', 1)->first();
        $services = Service::where ('show_on_home', 'Yes')->orderBy('id','asc')->get();
        return view('front.home', compact('sliders', 'about_item', 'counter_item', 'services'));
    }

    public function about()
    {
        $about_item = AboutItem::where ('id', 1)->first();
        $counter_item = CounterItem::where ('id', 1)->first();
        return view('front.about', compact('about_item', 'counter_item'));
    }

    public function services()
    {
        $services = Service::orderBy('id','asc')->paginate(6);
        return view('front.services', compact('services'));
    }

    public function service($slug)
    {
        $service = Service::where ('slug', $slug)->first();
        $services = Service::orderBy('title','asc')->get();
        return view('front.service', compact('service', 'services'));
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
