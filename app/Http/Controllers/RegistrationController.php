<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Providers\AuthServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        // Validate the form
        $this->validate(request(), [
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|email',
        ]);

        // Create and save the user

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        // Sign them in

        auth()->login($user);

        Mail::to($user)->send(new Welcome($user));

        // Redirect to the home page

        return redirect()->home();
        
    }
}
