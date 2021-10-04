<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class ChangePasswordController extends Controller
{
    //
    public function __construct(){
       $this->middleware('auth');
    }
    public function changePassTemplate(){
        return view('admin.profile.change-password-template');
    }

    public function updatePass(Request $req){
        $validation = $req->validate([
            'old_pass'=>'required|min:6',
            'password'=>'required|confirmed'
        ]);

        $hashUserPass = Auth::user()->password;
        if(Hash::check($req->old_pass,$hashUserPass)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($req->password);
            $user->save();
            Auth::logout();
            $notification= ['alert-type' =>'success',
            'message' => ' Password Changed Successfully'];
            return redirect()->route('login')->with($notification);
        }else{
            $notification= ['alert-type' =>'error',
            'message' => ' Invalid password'];
            return redirect()->back()->with($notification);
        }
    }

    
}
