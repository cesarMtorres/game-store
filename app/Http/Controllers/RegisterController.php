<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // registro de usuario
    public function create()
    {
        return view('register.create');
    }

    public function store(RegisterRequest $request)
    {
        $attributes = $request->validated();

        $user = User::create($attributes);


        Auth::login($user);


        return redirect('/')->with('success','Your Account was be Created.');
    }
}
