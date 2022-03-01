<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    //
    public function create()
    {
        return view('sessions.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
                'email' => 'Your provider credentials could not be verified.'
            ]);

        }
        session()->regenerate();
        return redirect('/')->with('success','Bienvenido');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success','Hasta Pronto');
    }
}
