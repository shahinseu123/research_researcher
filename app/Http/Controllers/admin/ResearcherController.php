<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResearcherController extends Controller
{


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function edit()
    {
        $researcher =  User::where('id', auth()->user()->id)->first();
        return view('admin.researcher_edit', ['researcher' => $researcher]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->address = $request->address;

        if ($request->password) {
            $request->validate([
                'password' => "required|confirmed|min:6"
            ]);
            $user->password = Hash::make($request->password);
        }

        if ($request->file('profile_img')) {
            $this->validate($request, [
                'image' => 'image|mimes:jpg,png,jpeg,gif'
            ]);

            $file = $request->file('profile_img');
            $photo = time() . '.' . $file->getClientOriginalExtension();


            $destination = public_path('/uploads/profile');
            $file->move($destination, $photo);
            if ($user->profile_img != null) {
                $img_del = public_path('/uploads/profile/' . $user->profile_img);
                if (file_exists($img_del)) {
                    unlink($img_del);
                }
            }
            $user->profile_img = $photo;
        }
        $user->save();
        return redirect()->back()->with('success', 'User updated');
    }
}
