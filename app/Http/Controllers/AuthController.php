<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    private const VERIFICATION_TOKEN_EXPIRY_MINUTES = 1440;
    private const RESET_TOKEN_EXPIRY_MINUTES = 1;
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);
        $token = Str::random(64);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_token' => hash ("sha256", $token),
            'verification_token_created_at' => now(),
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
        $user = User::where('verification_token', hash('sha256', $token))->first();
        if (! $user) {
            return redirect()->route('login')->with('error', 'Invalid or expired verification link.');
        }
        if (! $user->verification_token_created_at
            || $user->verification_token_created_at->lt(now()->subMinutes(self::VERIFICATION_TOKEN_EXPIRY_MINUTES))) {
            $user->verification_token = null;
            $user->verification_token_created_at = null;
            $user->save();
            return redirect()->route('login')->with('error', 'Verification link has expired. Please register again or request a new link.');
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

        $dummyHash = '$2y$12$abcdefghijklmnopqrstuuOdfXKj6P0Z1tVx0Zc4uKx9F5b4G8h3xS';
        $passwordHash = $user ? $user->password : $dummyHash;
        $validPassword = Hash::check($request->password, $passwordHash);

        $isVerified = $user && ! is_null($user->email_verified_at);

        if (! $user || ! $validPassword || ! $isVerified) {
            return back()->with('error', 'Invalid email or password.')->withInput($request->only('email'));
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
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $genericMessage = 'If an account with that email exists, a password reset link has been sent.';

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()->with('success', $genericMessage);
        }

        // 2. Generate and hash the reset token
        $token = Str::random(64);
        $user->reset_token = hash('sha256', $token);
        $user->reset_token_created_at = now();
        $user->save();

        $reset_url = route('password.reset', ['token' => $token]).'?email='.urlencode($user->email);
        $subject = 'Reset your password';
        $message = '<h3>Hello '.$user->name.',</h3>';
        $message .= '<p>We received a request to reset your password. Click the link below to set a new password:</p>';
        $message .= '<p><a href="'.$reset_url.'">'.$reset_url.'</a></p>';
        $message .= '<p>If you did not request a password reset, you can ignore this email.</p>';

        // 4. Send the email
        Mail::to($user->email)->send(new Websitemail($subject, $message));

        // 5. Return the exact same success message
        return back()->with('success', $genericMessage);
    }    public function showResetPassword(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);
        $user = User::where('email', $request->email)
            ->where('reset_token', hash ("sha256", $request->token))
            ->first();
        if (! $user) {
            return back()->with('error', 'Invalid or expired password reset link.')->withInput($request->only('email'));
        }

        if (! $user->reset_token_created_at
            || $user->reset_token_created_at->lt(now()->subMinutes(self::RESET_TOKEN_EXPIRY_MINUTES))) {
            $user->reset_token = null;
            $user->reset_token_created_at = null;
            $user->save();

            return back()->with('error', 'Password reset link has expired. Please request a new one.')->withInput($request->only('email'));
        }

        $user->password = Hash::make($request->password);
        $user->reset_token = null;
        $user->reset_token_created_at = null;
        $user->save();
        return redirect()->route('login')->with('success', 'Password has been reset. You can now log in with your new password.');
    }
}
