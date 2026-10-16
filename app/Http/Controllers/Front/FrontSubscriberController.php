<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class FrontSubscriberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $email = strtolower(trim($request->email));

        $subscriber = Subscriber::firstOrNew(['email' => $email]);

        if ($subscriber->exists && $subscriber->status === 'Active') {
            return redirect()->back()->with('error', 'This email is already subscribed.');
        }

        $token = Str::random(64);
        $subscriber->email = $email;
        $subscriber->token = $token;
        $subscriber->status = 'Pending';
        $subscriber->save();

        $verifyLink = route('subscribe.verify', ['token' => $token]);
        $message = '<p>Thank you for subscribing.</p>';
        $message .= '<p>Please verify your subscription by clicking the link below:</p>';
        $message .= '<p><a href="' . $verifyLink . '">Verify Subscription</a></p>';

        Mail::to($email)->send(new Websitemail('Verify Your Subscription', $message));

        return redirect()->back()->with('success', 'A verification email has been sent to your inbox.');
    }

    public function verify($token)
    {
        $subscriber = Subscriber::where('token', $token)->first();

        if (!$subscriber) {
            return redirect()->route('home')->with('error', 'Invalid or expired verification link.');
        }

        $subscriber->status = 'Active';
        $subscriber->token = null;
        $subscriber->save();

        return redirect()->route('home')->with('success', 'Your subscription has been verified successfully.');
    }
}
