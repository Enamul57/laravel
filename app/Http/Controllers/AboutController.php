<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\About;

class AboutController extends Controller
{
    //
    public function __construct(){
       $this->middleware('auth');
    }

    public function index(){
        $abouts = About::latest()->get();
        return view('admin.about.index',['abouts'=>$abouts]);
    }
    public function Add(){
        return view('admin.about.add-about');
    }

    public function store(Request $req){
        $about = new About;
        $about->title = $req->title;
        $about->short_desc = $req->short_desc;
        $about->long_desc = $req->long_desc;
        $about->created_at = Carbon::now();
        $about->save();
        return redirect()->route('home.about')->with('success','Added About Section');
    }

    public function edit($id){
        $about = About::find($id);
        return view('admin.about.edit',['abouts'=>$about]);
    }

    public function update(Request $req){
        $verification = $req->validate([
            'title' =>'required',
            'short_desc' =>'required',
            'long_desc' =>'required',

        ]);
        $about = About::find($req->id);
        $about->title = $req->title;
        $about->short_desc = $req->short_desc;
        $about->long_desc = $req->long_desc;
        $about->created_at = Carbon::now();
        $about->save();
        return redirect()->route('home.about')->with('success','Updated Successfully');
    }

    public function delete($id){
        $about = About::find($id)->delete();
        return redirect()->route('home.about')->with('success','Deleted Successfully');
    }
}
