<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('admin-panel.profile.index', compact('user'));
    }

    public function edit(Request $request)
    {
        $user = auth()->user();
        return view('admin-panel.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        //MATCH THE OLD PASSWORD
        if(!Hash::check($request->get('old_password'), Auth::user()->password)) {
            return back()->with('errorMsg', 'Old password does not match your old password');
        }

        //UPDATE NEW PASSWORD
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->get('new_password')),
        ]);
        return back()->with('successMsg', 'password change successfull.');

    }


}
