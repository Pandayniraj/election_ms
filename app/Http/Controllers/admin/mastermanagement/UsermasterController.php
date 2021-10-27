<?php

namespace App\Http\Controllers\admin\mastermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsermasterController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.usermaster.index',compact('users'));
    }

    public function create(Request $req)
    {
        $req->validate([
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password'
        
        ]);
        $user = new User;
        $user->name = $req->input('name');
        $user->identity = $req->input('identity');
        $user->email = $req->input('email');
        $user->password = $req->input('password');
        $user->save();

        $data = $req->input('name');
        $req->session()->flash('name',$data);
        return redirect(route('admin.user.index'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function editForm($id)
    {
        $user = User::find($id);
        return view('admin.usermaster.edit',compact('user'));
    }

    public function edit(Request $req)
    {
        $req->validate([
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password'
        
        ]);
        $user = User::find($req->id);
        $user->name = $req->input('name');
        $user->identity = $req->input('identity');
        $user->email = $req->input('email');
        $user->password = $req->input('password');
        $user->save();

        $data = $req->input('name');
        $req->session()->flash('edited',$data);
        return redirect(route('admin.user.index'));
    }
}
