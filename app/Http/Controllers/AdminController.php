<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class AdminController extends Controller
{
    //
    public function __construct(){
       $this->middleware('auth');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function edit(){
        if(Auth::user()){
            $users = User::find(Auth::user()->id);
            if($users){
                return view('admin.profile.profile',['users'=>$users]);
            }
        }
    }

    public function update(Request $req){
        $user = User::find(Auth::user()->id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->save();
        $notification= ['alert-type' =>'success',
        'message' => ' Profile Information changed Successfully'];
        return redirect()->back()->with($notification);
    }
}
