<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getAuth(Request $request)
    {
        if (Auth::check()) {
            return redirect('/tweeter');
        } else {
            $param = ['message' => 'ログインしていません'];
            return view('tweeter.auth', $param);
        }
    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $msg = 'ログインしました';
        } else {
            $msg = 'ログインできません';
            return view('tweeter.auth', ['message' => $msg]);
        }

        return redirect('/tweeter');
    }
}
