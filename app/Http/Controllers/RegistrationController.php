<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationForm $form)
    {
        // Validate the form
        /* Перенес валидацию в класс RegistrationRequest
        $this->validate(request(), [
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|email',
        ]);*/

        // Create and save the user

        /* Look in RegistrationRequest::persist()

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        // Sign them in

        auth()->login($user);

        Mail::to($user)->send(new WelcomeAgain($user));*/

        // Redirect to the home page
        
        $form->persist();
        
        session()->flash('message', 'Вы успешно зарегистрировались');

        return redirect()->home();
        
    }
}
