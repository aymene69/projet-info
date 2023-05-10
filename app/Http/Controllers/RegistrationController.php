<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('inscription.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'username' => 'required',
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create(request(['username', 'prenom', 'nom', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/');
    }
}
