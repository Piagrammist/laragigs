<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function store(Request $req): RedirectResponse
    {
        $formFields = $req->validate([
            'name'     => 'required|min:3|max:255',
            'email'    => 'required|max:254|email|unique:users',
            'password' => 'required|min:8|max:255|confirmed',
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        Auth::login(User::create($formFields));

        return to_route('listings.index')
            ->with('success', 'Account created successfully!');
    }

    public function login(Request $req): RedirectResponse
    {
        $formFields = $req->validate([
            'email'    => 'required|max:254|email',
            'password' => 'required|min:8|max:255',
        ]);
        if (Auth::attempt($formFields)) {
            $req->session()->regenerate();
            return to_route('listings.index');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function logout(Request $req): RedirectResponse
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return to_route('listings.index');
    }
}
