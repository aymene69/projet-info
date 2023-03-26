<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class ProfileController extends Controller
{
    public function viewprofile(string $id) {
        $user = auth()->user();
        if ($user == null) {
            return redirect()->route('login');
        }
        else {
            if ($user->id == $id) {
                return view('profile.my', ['id' => $id]);
            }
            else {
                return view('profile.other', ['id' => $id]);
            }
        }
    }

    public function modifavatar() {
        $user = auth()->user();
        $data = request(['avatar']);
        $fileName = $user->id.'.'.$data['avatar']->extension();
        $data['avatar']->move(public_path('avatar'), $fileName);
        DB::table('users')->where('id', $user->id)->update([
            'avatar' => $fileName
        ]);

        return redirect()->route('viewprofile', ['id' => $user->id]);
    }

    public function modifusername() {
        $user = auth()->user();
        $data = request(['username']);
        DB::table('users')->where('id', $user->id)->update([
            'username' => $data['username']
        ]);

        return redirect()->route('viewprofile', ['id' => $user->id]);
    }

    public function modifemail() {
        $user = auth()->user();
        $data = request(['email']);
        DB::table('users')->where('id', $user->id)->update([
            'email' => $data['email']
        ]);

        return redirect()->route('viewprofile', ['id' => $user->id]);
    }

    public function modifpassword() {
        $user = auth()->user();
        $password = request(['password']);
        $password = $password['password'];
        $user->setPasswordAttribute($password);
        $user->save();

        return redirect()->route('viewprofile', ['id' => $user->id]);
    }
}
