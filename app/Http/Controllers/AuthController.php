<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $token = Str::random(64);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_token' => $token,
        ]);
        $verify_url = route('verify', ['token' => $token]);
        $subject = 'Please verify your email';
        $message = '<h3>Hello '.$user->name.',</h3>';
        $message .= '<p>Thanks for registering. Please click the link below to verify your email address:</p>';
        $message .= '<p><a href="'.$verify_url.'">'.$verify_url.'</a></p>';
        Mail::to($user->email)->send(new Websitemail($subject, $message));
        return redirect()->route('login')->with('success', 'Registered successfully. Please check your email to verify your account.');
    }
    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();
        if (! $user) {
            return redirect()->route('login')->with('error', 'Invalid or expired verification link.');
        }
        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();
        return redirect()->route('login')->with('success', 'Email verified successfully. You can now log in.');
    }
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid email or password.')->withInput($request->only('email'));
        }
        if (is_null($user->email_verified_at)) {
            return back()->with('error', 'Please verify your email before logging in.')->withInput($request->only('email'));
        }
        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
//    public function showForgotPassword()
//    {
//        return view('auth.forgot-password');
//    }
//    public function sendResetLink(Request $request)
//    {
//        $request->validate([
//            'email' => 'required|email',
//        ]);
//        $user = User::where('email', $request->email)->first();
//        if (! $user) {
//            return back()->with('error', 'No account found with that email address.')->withInput();
//        }
//        $token = Str::random(64);
//        $user->reset_token = $token;
//        $user->save();
//        $reset_url = route('password.reset', ['token' => $token]).'?email='.urlencode($user->email);
//        $subject = 'Reset your password';
//        $message = '<h3>Hello '.$user->name.',</h3>';
//        $message .= '<p>We received a request to reset your password. Click the link below to set a new password:</p>';
//        $message .= '<p><a href="'.$reset_url.'">'.$reset_url.'</a></p>';
//        $message .= '<p>If you did not request a password reset, you can ignore this email.</p>';
//        Mail::to($user->email)->send(new Websitemail($subject, $message));
//        return back()->with('success', 'A password reset link has been sent to your email.');
//    }
//    public function showResetPassword(Request $request, $token)
//    {
//        return view('auth.reset-password', [
//            'token' => $token,
//            'email' => $request->query('email'),
//        ]);
//    }
//    public function resetPassword(Request $request)
//    {
//        $request->validate([
//            'token' => 'required|string',
//            'email' => 'required|email',
//            'password' => 'required|string|min:6|confirmed',
//        ]);
//        $user = User::where('email', $request->email)
//            ->where('reset_token', $request->token)
//            ->first();
//        if (! $user) {
//            return back()->with('error', 'Invalid or expired password reset link.')->withInput($request->only('email'));
//        }
//        $user->password = Hash::make($request->password);
//        $user->reset_token = null;
//        $user->save();
//        return redirect()->route('login')->with('success', 'Password has been reset. You can now log in with your new password.');
//    }
}
