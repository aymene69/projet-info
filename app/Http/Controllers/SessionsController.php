<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('connexion.create');
    }

    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return view('connexion.create')->with([
                'message' => 'Les identifiants sont incorrects.',
                'failed' => true,
            ]);
        }

        return redirect()->to('/');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
