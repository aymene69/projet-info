<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function listequestions()
    {
        return view('admin.liste');
    }

    public function editquestions()
    {
        return view('admin.edit');
    }
}
