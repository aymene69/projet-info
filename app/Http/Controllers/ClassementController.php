<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClassementController extends Controller
{
    public function classement()
    {
        $users = DB::table('users')->orderBy('score', 'desc')->get();
        return view('classement.index', ['users' => $users]);
    }
}
