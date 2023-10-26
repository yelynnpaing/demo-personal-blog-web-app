<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

  public function index()
  {
    $user = auth()->user();
    return view('ui-panel.profile.index', compact('user'));
  }

  public function edit()
  {
    $user = auth()->user();
    return view('ui-panel.profile.edit', compact('user'));
  }

  public function update(Request $request)
    {
        // VALIDATION
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        //MATCH THE OLD PASSWORD
        if(!Hash::check($request->get('old_password'), Auth::user()->password)){
            return back()->with('errorMsg','Old Password does not match your old password!');
        }
        
        //UPDATE NEW PASSWORD
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->get('new_password'))
        ]);
        return back()->with('successMsg','Password changing is successfull.');
    }
}
