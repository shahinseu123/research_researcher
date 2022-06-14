<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login.login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // return $request->all();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role == 'researcher') {
                return redirect()->route('user.research-progress');
            } else {
                return redirect()->route('login')->with('error', 'Sorry, you are not a researcher');
            }
        } else {
            return redirect()->back()->with('error', 'Login credentials incorrect');
        }
    }
}
