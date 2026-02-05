<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {

        return view('login');
    }

    public function showRegister()
    {

        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required|integer|in:1,2',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return $this->redirectDash();
        }

        return back()->withErrors(['email' => 'Invalid login details']);
        return redirect()->route('user.dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function redirectDash()
    {
        $user = Auth::user();

        if ($user->role_id == User::ADMIN) {
            return redirect('/admin/dashboard');
        }

        return redirect('/user/dashboard');
    }

    public function showForgot()
    {
        return view('forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

       
        $token = Str::random(64);

        
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => Carbon::now(),
            ]
        );

        
        $resetLink = url('/reset-password/'.$token.'?email='.$request->email);

        
        Mail::raw(
            "Click this link to reset your password:\n\n$resetLink",
            function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('Reset Password');
            }
        );

        return back()->with('success', 'Password reset link sent to your email');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (! $record) {
            return back()->withErrors(['email' => 'Invalid token']);
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        return redirect()->route('login')->with('success', 'Password reset successfully');
    }

    public function showResetForm($token, Request $request)
    {
        return view('reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }
}
