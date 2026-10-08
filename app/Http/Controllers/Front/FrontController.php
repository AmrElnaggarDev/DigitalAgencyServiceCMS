<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutItem;
use App\Models\CounterItem;
use App\Models\CtaItem;
use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index ()
    {
        $sliders = Slider::orderBy('id','asc')->get();
        $about_item = AboutItem::where ('id', 1)->first();
        $cta_item = CtaItem::where('id',1)->first();
        $counter_item = CounterItem::where ('id', 1)->first();
        $services = Service::where ('show_on_home', 'Yes')->orderBy('id','asc')->get();
        $team_members = TeamMember::orderBy('id','asc')->get();
        $projects = Project::where ('show_on_home', 'Yes')->orderBy('id','asc')->get();
        $faqs = Faq::where ('show_on_home', 'Yes')->orderBy('id','asc')->get();
        return view('front.home', compact('sliders', 'about_item', 'cta_item', 'counter_item', 'services', 'team_members', 'projects', 'faqs'));
    }

    public function about()
    {
        $about_item = AboutItem::where ('id', 1)->first();
        $counter_item = CounterItem::where ('id', 1)->first();
        $team_members = TeamMember::orderBy('id','asc')->get();
        $testimonials = Testimonial::orderBy('id','asc')->get();
        return view('front.about', compact('about_item', 'counter_item', 'team_members', 'testimonials'));
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
        $projects = Project::orderBy ('id','asc')->paginate(6);
        return view('front.projects', compact('projects'));
    }

    public function project ($slug)
    {
        $project = Project::where ('slug', $slug)->first();
        $next_project = Project::where('id', '>', $project->id)->orderBy('id','asc')->first();
        $previous_project = Project::where('id', '<', $project->id)->orderBy('id','desc')->first();
        return view('front.project', compact('project', 'next_project', 'previous_project'));
    }

    public function team_members()
    {
        $team_members = TeamMember::orderBy ('id','asc')->paginate(6);
        return view('front.team_members', compact('team_members'));
    }

    public function team_member($slug)
    {
        $team_member = TeamMember::where('slug', $slug)->first();
        return view('front.team_member', compact('team_member'));
    }

    public function faq ()
    {
        $faqs = Faq::orderBy('id','asc')->get();
        return view('front.faq', compact('faqs'));
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
