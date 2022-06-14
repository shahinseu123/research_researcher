<?php

namespace App\Http\Controllers\register;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register.register');
    }

    public function register_action(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required||unique:users',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->role = 'researcher';
        $admin->address = $request->address;
        $admin->password = Hash::make($request->password);
        $admin->save();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role == 'researcher') {
                return redirect()->route('user.research-progress');
            } else {
                return redirect()->route('login')->with('error', 'Sorry, you are not a researcher');
            }
        } else {
            return redirect()->back()->with('error', 'User registration failed');
        }
    }
}
