<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function login_form(){
        return view('login');
    }

    public function login_action(Request $request) {
            $users = Users::where('username', $request->username)->first();
            if ($users == null) {
                return redirect()->back()->with('error','Maaf username atau password anda salah');
            }
            $db_password = $users->password;
            $hashed_password = Hash::check($request->password, $db_password);
            
            if ($hashed_password) {
                $users->token = Str::random(20);
                $users->save();
                $request->session()->put('token',$users->token);
                return to_route('dashboard_index');
            } else {
                return redirect()->back()->with('error', 'Maaf username atau password anda salah');
            }
    }

    public function dashboard_index() {
        if (Session::has('token')) {
            return view('dashboard/index');
        } else {
            return redirect()->back();
        }
    }
}