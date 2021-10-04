<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Carbon;
use Image;
class GalleryController extends Controller
{

    //verify
    public function __construct(){
        $this->middleware('auth');
     }

     


    //display
    public function Show(){
         $image = Gallery::all();
        return view('admin.gallery.index',['images' =>$image]);
    }
    //store

    public function Store(Request $req){
        $req->validate([
            'image' => 'required'
        ]);
        $file = $req->file('image');

        foreach($file as $multiImg){
            $namegen = hexdec(uniqid()).".".$multiImg->getClientOriginalExtension();
            Image::make($multiImg)->resize(400,300)->save('image/multi/'.$namegen);
            $path = 'image/multi/'.$namegen;
            
            $gallery = new Gallery();
            $gallery->image = $path;
            $gallery->created_at = Carbon::now();
            $gallery->save();
        }
        $notification= ['alert-type' =>'success',
        'message' => 'Image Uploaded Successfully'];
        return redirect()->
            route('show.gallery')->
                with($notification);
    }

}
