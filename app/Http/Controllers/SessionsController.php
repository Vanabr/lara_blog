<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {

        auth()->logout();

        return redirect()->home();
    }

    public function store()
    {


        // Attempt to authenticate  the user.
        /*
         * attempt() automatically sign in user if it exists
         */
        if (! Auth::attempt(request(['email', 'password']))) {
            dd(request(['email', 'password']));

            return back()->withErrors([
                'message' => 'Please, check your credentials'
            ]);
        }

        return redirect()->home();
        
    }
}
