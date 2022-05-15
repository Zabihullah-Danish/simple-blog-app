<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
       $user = $request->validate([
           'name' => ['required','string','max:50'],
           'email' => ['required','string', 'email','max:100','unique:users,email'],
           'password' => ['required','confirmed'],
       ]);

        $registeredUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);
        Auth::login($registeredUser);

        return redirect()->intended('dashboard');

    }
}
