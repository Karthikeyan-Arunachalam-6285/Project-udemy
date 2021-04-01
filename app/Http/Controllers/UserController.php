<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
class UserController extends Controller
{
    //
    public function showUsers(User $user )
    {
        return view('admin/users/profile',['user'=>$user]);
    }
    public function update(Request $req)
    {
            $user = User::find($req->id);
            $user->name = $req->name;
            $user->password = $req->password;
            $user->save();
            $req->session()->flash('message','Profile has been updated');
            return back();
    }
    public function index( )
    {
        $users = User::all();
        return view ('admin/users/index',['users' => $users]);
    }
    public function delete($id)
    {
        $user= User::find($id);
        $user->delete();
        session()->flash('message','user has been deleted...');
        return redirect('admin/users');
   }
}
