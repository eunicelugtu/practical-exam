<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login(User::where('email', $validated['email'])->first());

        return redirect()->route('showTimeline')
            ->with('success', 'Registration successful! Welcome aboard!');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (Auth::attempt($credentials)) {

            Auth::login($user);

            return redirect()->intended(route('showTimeline'))
                ->with('success', 'Welcome back!');
        }

        if (!$user) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'No account found with this email address.'
                ]);
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'password' => 'The provided password is incorrect.'
            ]);
    }

    public function showTimeline()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();

        return view('timeline', compact('posts'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('loginForm')
            ->with('success', 'You have been logged out successfully.');
    }
}
