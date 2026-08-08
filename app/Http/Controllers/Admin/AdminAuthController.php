<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AdminAuthController extends Controller
{
    /**
     * The guard this controller authenticates against.
     */
    private const GUARD = 'admin';

    /**
     * Password reset link expiry in minutes.
     */
    private const RESET_TOKEN_EXPIRY_MINUTES = 60;

    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        // Constant-time check to prevent timing-based account enumeration.
        $dummyHash = '$2y$12$eachKd6aMTAMgfu72jIGS.KEg9Sph/LCMNkaYoLKbHBbzHDD3ZB5i';
        $passwordHash = $admin ? $admin->password : $dummyHash;
        $validPassword = Hash::check($request->password, $passwordHash);

        if (! $admin || ! $validPassword) {
            return back()->with('error', 'Invalid email or password.')->withInput($request->only('email'));
        }

        Auth::guard(self::GUARD)->login($admin, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')->with('success', 'Login successfully.');
    }

    public function logout(Request $request)
    {
        Auth::guard(self::GUARD)->logout();
        // $request->session()->invalidate();
        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function showForgotPassword()
    {
        return view('admin.auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $genericMessage = 'If an admin account with that email exists, a password reset link has been sent.';

        $admin = Admin::where('email', $request->email)->first();

        if (! $admin) {
            return back()->with('success', $genericMessage);
        }

        $token = Str::random(64);
        $admin->reset_token = hash('sha256', $token);
        $admin->reset_token_created_at = now();
        $admin->save();

        $reset_url = route('admin.password.reset', ['token' => $token]).'?email='.urlencode($admin->email);

        $subject = 'Reset your admin password';
        $message = '<h3>Hello '.$admin->name.',</h3>';
        $message .= '<p>We received a request to reset your admin password. Click the link below to set a new password:</p>';
        $message .= '<p><a href="'.$reset_url.'">'.$reset_url.'</a></p>';
        $message .= '<p>If you did not request a password reset, you can ignore this email.</p>';

        Mail::to($admin->email)->send(new Websitemail($subject, $message));

        return back()->with('success', $genericMessage);
    }

    public function showResetPassword(Request $request, $token)
    {
        return view('admin.auth.reset-password', [
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

        $admin = Admin::where('email', $request->email)
            ->where('reset_token', hash('sha256', $request->token))
            ->first();

        if (! $admin) {
            return back()->with('error', 'Invalid or expired password reset link.')->withInput($request->only('email'));
        }

        if (! $admin->reset_token_created_at
            || $admin->reset_token_created_at->lt(now()->subMinutes(self::RESET_TOKEN_EXPIRY_MINUTES))) {
            $admin->reset_token = null;
            $admin->reset_token_created_at = null;
            $admin->save();

            return back()->with('error', 'Password reset link has expired. Please request a new one.')->withInput($request->only('email'));
        }

        $admin->password = Hash::make($request->password);
        $admin->reset_token = null;
        $admin->reset_token_created_at = null;
        $admin->save();

        return redirect()->route('admin.login')->with('success', 'Password has been reset. You can now log in with your new password.');
    }
}
