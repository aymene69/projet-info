<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReglesController extends Controller
{
    public function regles()
    {
        return view('regles.index');
    }
}
