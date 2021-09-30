<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
class SliderController extends Controller
{
    //
    public function __construct(){
       $this->middleware('auth');
    }

    public function show(){
        $slider = Slider::get();
        return view('admin.slider.index',['sliders'=>$slider]);
    }

    public function add(){
        return view('admin.slider.add-slider');
    }

    public function store(Request $req){
        $validation = $req->validate([
            'title' => 'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg'
        ]);

        $slider = new Slider;
        $slider->title = $req->title;
        $slider->description = $req->description;
        $slider->created_at = Carbon::now();
        $file = $req->file('image');
        $namegen = hexdec(uniqid()).".".$file->getClientOriginalExtension();
        Image::make($file)->resize(1920,1080)->save('image/slider/'.$namegen);
        $slider->image = 'image/slider/'.$namegen;
        $slider->save();

        return redirect()->route('slider.show')->with('success','Slider Uploaded Successfully');
    }

    //edit
    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit',['slider'=>$slider]);
    }

    //update
    public function update(Request $req){
        $validation = $req->validate([
            'title' => 'required',
            'description'=>'required'
        ]);
        $file = $req->file('image');
        if($file){
        $slider = Slider::find($req->id);
        $frontName = hexdec(uniqid());
        $ext = strtolower($file->getClientOriginalExtension());
        $imageName = $frontName.".".$ext;
        $path= 'image/slider/';
        $old_image =$req->old_image;
        if(file_exists($old_image)){
            unlink($old_image);
        }
            Image::make($file)->resize(1280,960)->save($path.$imageName);


        $databasePath = $path.$imageName;
        $slider->title = $req->title;
        $slider->description = $req->description;
        $slider->image = "image/slider/".$imageName;
        $slider->created_at = Carbon::now();
        $slider->save();
        return redirect()->route('slider.show')->with('success','Slider Updated Successfully');
        }
        else{
            $slider = Slider::find($req->id);
            $slider->title = $req->title;
            $slider->description = $req->description;
            $slider->created_at = Carbon::now();
            $slider->save();
         return redirect()->route('slider.show')->with('success','Slider Updated Successfully');
        }
    }

    public function delete($id){
        Slider::find($id)->delete();
        return redirect()->route('slider.show')->with('success','Slider Deleeted Successfully');
    }
}
