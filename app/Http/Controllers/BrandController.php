<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Image;
// use Intervention\Image\ImageManagerStatic;
class BrandController extends Controller
{
    //verify
    public function __construct(){
        $this->middleware('auth');
     }

     
    //Show
    public function Show(){
        $brand = Brand::latest()->paginate(7);
        return view('admin.brand.index',['brands'=>$brand]);
    }

    //Store
    public function Store(Request $req){
       
        //validation
        
        $validation = $req->validate([
            'brand_name' => 'required|unique:brands|min:3',
            'brand_image' => 'required|mimes:jpg,jpeg,png'
        ]);
      

        //file name and store
        $brand_image = $req->file('brand_image');
        $name_gen = hexdec(uniqid()).".".$brand_image->getClientOriginalExtension();
        $image = Image::make($brand_image);
        $image->resize(300,200)->save('image/brand/'.$name_gen);
        $storingToDatabase = 'image/brand/'.$name_gen;

            

            $brand = new Brand();
            $brand->brand_name = $req->brand_name;
            $brand->brand_image= $storingToDatabase;
            $brand->created_at = Carbon::now();
            $brand->save();
            return back()->with('success','Image inserted successfully');

        
    }
// $uniqueName = hexdec(uniqid());
            // $getExt = $brand_image->getClientOriginalExtension();
            // $fullImgName = $uniqueName.".".$getExt;
            // $path = "image/brand/";
            // $brand_image->move($path,$fullImgName);
            // $storingToDatabase = $path.$fullImgName;
    //Brand Edit
    public function Edit($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit',['brands'=>$brand]);
    }

    //Brand Update Submission
    public function Update(Request $req){

        $validation = $req->validate([
            'brand_name' => 'required||min:3',
        ]);

        
            $file = $req->file('brand_image');
            if($file){
                $brand = Brand::find($req->id);
                $frontName = hexdec(uniqid());
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = $frontName.".".$ext;
                $path= 'image/brand/';
                $old_image =$req->old_image;
                
                if(file_exists($old_image)){
                    unlink($old_image);
                }
                    $file->move($path,$imageName);

        
                $databasePath = $path.$imageName;
                $brand->brand_name = $req->brand_name;
                $brand->brand_image = $databasePath;
                $brand->created_at = Carbon::now();
                $brand->save();
                return redirect()->route('show.brand')->with('success','Brand Updated Successfully');
                }else{
                    $brand = Brand::find($req->id);
                    $brand->brand_name = $req->brand_name;
                    $brand->created_at = Carbon::now();
                    $brand->save();
                    return redirect()->route('show.brand')->with('success','Brand Updated Successfully');
                    }
        
    }

    //delete brand with unlinking image
    public function Delete($id){
        $brand = Brand::find($id);
        $img = $brand->brand_image;
        Brand::find($id)->delete();
        if(file_exists($img)){
            unlink($img);
        }
        return redirect()->back()->with('success','Brand Deletion Successfully');
    }
}
