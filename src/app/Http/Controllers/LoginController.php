<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Auth;
use Hash;

class LoginController extends Controller
{

    public function loginForm(Request $request)
    {
        return view('admin.login');
    }

    public function loginCallback(Request $request)
    {
        $credentials = $request->except('_token');

        $sucesso = Auth::attempt($credentials);
        
        if ($sucesso) {
            return redirect(route('admin.dashboard'));
        } else {
            flash('Email ou senha incorretos')->error();
            return redirect()->back();
        }
    }

    public function logoutCallback(Request $request)
    {
        Auth::logout();
        return redirect(route('admin.login.form'));
    }
}
