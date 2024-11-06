<?php

namespace App\Http\Controllers;

use App\Users;
use App\Artikel;
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
            $users = Users::where('token', Session::get('token'))->first();
            $article = Artikel::get();
            return view('dashboard/index', [
                "title" => "DASHBOARD ADMIN",
                "users" => $users,
                "article" => $article
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function dashboard_logout(Request $request) {
        Users::where('token', $request->token)->update([
            'token' => NULL
        ]);
        Session::pull('token');
        return to_route('login_form');
    }

    public function article_delete_action(Request $request) {
        Artikel::find($request->id)->delete();
        return redirect()->back()->with('message', 'Artikel berhasil dihapus');
    }

    public function article_add_action(Request $request) {

        $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'description' => ['required'],
            'tag' => ['nullable'],
        ]);

        $created = Artikel::create([
            "title" => $request->title,
            "description" => $request->description,
            "tag" => $request->tag,
        ]);

        if($created) {
            return redirect()->back()->with('message', 'Artikel berhasil dibuat');
        } else {
            return redirect()->back()->with('message', 'Artikel gagal dibuat');
        }
    }
} 