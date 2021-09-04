<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'gender' => 'required',
            'age' => 'required|integer',
            'password' => 'required|min:6|max:255'
        ]);
        $user = User::create($attributes);
        Auth::login($user);
        return redirect('/')->with('success', 'Your account has been created successfully');
    }
}
