<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   public function index()
   {
        $users = User::all();
        // dd($users);
        return view('admin-panel.user.index', [
            'users' => $users
        ]);
   }

   public function edit($id)
   {
        $user = User::all()->find($id);
        return view('admin-panel.user.edit', [
            'user' => $user
        ]);
   }

   public function update(Request $request, $id)
   {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);
        return redirect('/admin/users')->with('successMsg', 'You was successfully updated.');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users')->with('successMsg', 'You have suceessfully deleted.');
    }
}
