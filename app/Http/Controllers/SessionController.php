<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes =  request()->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attributes, true)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials are not match.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
