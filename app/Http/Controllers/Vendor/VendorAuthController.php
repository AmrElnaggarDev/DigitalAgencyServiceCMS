<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class VendorAuthController extends Controller
{
    /**
     * The guard this controller authenticates against.
     */
    private const GUARD = 'vendor';

    /**
     * Email verification link expiry in minutes (24 hours).
     */
    private const VERIFICATION_TOKEN_EXPIRY_MINUTES = 1440;

    /**
     * Password reset link expiry in minutes.
     */
    private const RESET_TOKEN_EXPIRY_MINUTES = 60;

    public function showRegister()
    {
        return view('vendor.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        $token = Str::random(64);

        $vendor = Vendor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_token' => hash('sha256', $token),
            'verification_token_created_at' => now(),
        ]);

        $verify_url = route('vendor.verify', ['token' => $token]);

        $subject = 'Please verify your vendor email';
        $message = '<h3>Hello '.$vendor->name.',</h3>';
        $message .= '<p>Thanks for registering as a vendor. Please click the link below to verify your email address:</p>';
        $message .= '<p><a href="'.$verify_url.'">'.$verify_url.'</a></p>';

        Mail::to($vendor->email)->send(new Websitemail($subject, $message));

        return redirect()->route('vendor.login')->with('success', 'Registered successfully. Please check your email to verify your account.');
    }

    public function verify($token)
    {
        $vendor = Vendor::where('verification_token', hash('sha256', $token))->first();

        if (! $vendor) {
            return redirect()->route('vendor.login')->with('error', 'Invalid or expired verification link.');
        }

        if (! $vendor->verification_token_created_at
            || $vendor->verification_token_created_at->lt(now()->subMinutes(self::VERIFICATION_TOKEN_EXPIRY_MINUTES))) {
            $vendor->verification_token = null;
            $vendor->verification_token_created_at = null;
            $vendor->save();

            return redirect()->route('vendor.login')->with('error', 'Verification link has expired. Please register again or request a new link.');
        }

        $vendor->email_verified_at = now();
        $vendor->verification_token = null;
        $vendor->verification_token_created_at = null;
        $vendor->save();

        return redirect()->route('vendor.login')->with('success', 'Email verified successfully. You can now log in.');
    }

    public function showLogin()
    {
        return view('vendor.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $vendor = Vendor::where('email', $request->email)->first();

        // Constant-time check to prevent timing-based account enumeration.
        $dummyHash = '$2y$12$eachKd6aMTAMgfu72jIGS.KEg9Sph/LCMNkaYoLKbHBbzHDD3ZB5i';
        $passwordHash = $vendor ? $vendor->password : $dummyHash;
        $validPassword = Hash::check($request->password, $passwordHash);

        if (! $vendor || ! $validPassword) {
            return back()->with('error', 'Invalid email or password.')->withInput($request->only('email'));
        }

        if (is_null($vendor->email_verified_at)) {
            return back()->with('error', 'Please verify your email before logging in.')->withInput($request->only('email'));
        }

        Auth::guard(self::GUARD)->login($vendor, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->route('vendor.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard(self::GUARD)->logout();
        // $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('vendor.login')->with('success', 'Logged out successfully.');
    }

    public function dashboard()
    {
        return view('vendor.dashboard');
    }

    public function showForgotPassword()
    {
        return view('vendor.auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $genericMessage = 'If a vendor account with that email exists, a password reset link has been sent.';

        $vendor = Vendor::where('email', $request->email)->first();

        if (! $vendor) {
            return back()->with('success', $genericMessage);
        }

        $token = Str::random(64);
        $vendor->reset_token = hash('sha256', $token);
        $vendor->reset_token_created_at = now();
        $vendor->save();

        $reset_url = route('vendor.password.reset', ['token' => $token]).'?email='.urlencode($vendor->email);

        $subject = 'Reset your vendor password';
        $message = '<h3>Hello '.$vendor->name.',</h3>';
        $message .= '<p>We received a request to reset your vendor password. Click the link below to set a new password:</p>';
        $message .= '<p><a href="'.$reset_url.'">'.$reset_url.'</a></p>';
        $message .= '<p>If you did not request a password reset, you can ignore this email.</p>';

        Mail::to($vendor->email)->send(new Websitemail($subject, $message));

        return back()->with('success', $genericMessage);
    }

    public function showResetPassword(Request $request, $token)
    {
        return view('vendor.auth.reset-password', [
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

        $vendor = Vendor::where('email', $request->email)
            ->where('reset_token', hash('sha256', $request->token))
            ->first();

        if (! $vendor) {
            return back()->with('error', 'Invalid or expired password reset link.')->withInput($request->only('email'));
        }

        if (! $vendor->reset_token_created_at
            || $vendor->reset_token_created_at->lt(now()->subMinutes(self::RESET_TOKEN_EXPIRY_MINUTES))) {
            $vendor->reset_token = null;
            $vendor->reset_token_created_at = null;
            $vendor->save();

            return back()->with('error', 'Password reset link has expired. Please request a new one.')->withInput($request->only('email'));
        }

        $vendor->password = Hash::make($request->password);
        $vendor->reset_token = null;
        $vendor->reset_token_created_at = null;
        $vendor->save();

        return redirect()->route('vendor.login')->with('success', 'Password has been reset. You can now log in with your new password.');
    }
}

