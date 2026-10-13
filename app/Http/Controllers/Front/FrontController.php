<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\AboutItem;
use App\Models\Admin;
use App\Models\Client;
use App\Models\ContactPageItem;
use App\Models\CounterItem;
use App\Models\CtaItem;
use App\Models\Faq;
use App\Models\Package;
use App\Models\Photo;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $clients = Client::orderBy('id','asc')->get();
        return view('front.about', compact('about_item', 'counter_item', 'team_members', 'testimonials', 'clients'));
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
        $packages = Package::orderBy ('id','asc')->get();
        return view('front.pricing', compact('packages'));
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
        $posts = Post::orderBy('id','desc')->paginate(3);
        $categories = PostCategory::orderBy('name','asc')->get();
        $recent_posts = Post::orderBy('id','desc')->take(3)->get();
        $all_tags = Post::pluck('tags')->filter()->flatMap(function ($tags) {
            return explode(',', $tags);
        })->map(function ($tag) {
            return trim($tag);
        })->filter()->unique()->values();

        return view('front.blog', compact('posts', 'categories', 'recent_posts', 'all_tags'));
    }

    public function category($slug)
    {
        $category = PostCategory::where('slug', $slug)->firstOrFail();
        $posts = Post::where('post_category_id', $category->id)->orderBy('id','desc')->paginate(3);
        $categories = PostCategory::orderBy('name','asc')->get();
        $recent_posts = Post::orderBy('id','desc')->take(3)->get();
        $all_tags = Post::pluck('tags')->filter()->flatMap(function ($tags) {
            return explode(',', $tags);
        })->map(function ($tag) {
            return trim($tag);
        })->filter()->unique()->values();

        return view('front.category', compact('posts', 'category', 'categories', 'recent_posts', 'all_tags'));
    }


    public function tag($tag)
    {
        $posts = Post::whereRaw("FIND_IN_SET(?, REPLACE(tags, ' ', ''))", [str_replace(' ', '', $tag)])
            ->orderBy('id', 'desc')
            ->paginate(3);

        $categories = PostCategory::orderBy('name','asc')->get();
        $recent_posts = Post::orderBy('id','desc')->take(3)->get();
        $all_tags = Post::pluck('tags')->filter()->flatMap(function ($tags) {
            return explode(',', $tags);
        })->map(function ($singleTag) {
            return trim($singleTag);
        })->filter()->unique()->values();

        return view('front.tag', compact('posts', 'tag', 'categories', 'recent_posts', 'all_tags'));
    }

    public function search(Request $request)
    {

    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
//        $comments = Comment::with(['replies' => function($query) {
//            $query->where('status', 'Approved')->orderBy('id', 'asc');
//        }])->where('post_id', $post->id)->where('status', 'Approved')->orderBy('id', 'desc')->get();
        $categories = PostCategory::orderBy('name','asc')->get();
        $recent_posts = Post::orderBy('id','desc')->take(3)->get();
        $all_tags = Post::pluck('tags')->filter()->flatMap(function ($tags) {
            return explode(',', $tags);
        })->map(function ($tag) {
            return trim($tag);
        })->filter()->unique()->values();

        return view('front.post', compact('post', 'categories', 'recent_posts', 'all_tags'));
    }

    public function contact()
    {
        $contact_page_item = ContactPageItem::first();
        return view('front.contact', compact('contact_page_item'));
    }

    public function contact_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'massage' => 'required|string',
        ]);

        $adminEmail = Admin::query()->value('email');

        if (empty($adminEmail)) {
            return back()->with('error', 'No admin email is configured.')->withInput();
        }

        $subject = 'New contact message: ' . $request->subject;
        $message = '<h3>Contact form message</h3>';
        $message .= '<p><strong>Name:</strong> ' . e($request->name) . '</p>';
        $message .= '<p><strong>Email:</strong> ' . e($request->email) . '</p>';
        $message .= '<p><strong>Phone:</strong> ' . e($request->phone ?? 'N/A') . '</p>';
        $message .= '<p><strong>Subject:</strong> ' . e($request->subject) . '</p>';
        $message .= '<p><strong>Message:</strong></p>';
        $message .= '<p>' . nl2br(e($request->massage)) . '</p>';

        Mail::to($adminEmail)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

    public function photo_gallery()
    {
        $photos = Photo::orderBy('id','asc')->paginate(6);
        return view('front.photo_gallery', compact('photos'));
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
