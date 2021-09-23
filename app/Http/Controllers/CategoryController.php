<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
class CategoryController extends Controller
{
    //View Category Page
    public function index(){
        return view('admin/category/category');
    }
    //Validate Category & Add category to database
    public function AddCat(Request $req){
        $validation = $req->validate([
            'category_name' => "required |unique:categories| max:255"
        ],
        [
            'category_name.required' => "Please enter category name"
        ],
        [
            'category_name.max' => "Characater should be less than 255"
        ]
    );
        
        $category= new Category;
        $category->user_id = Auth::user()->id;
        $category->category_name = $req->input('category_name');
        $category->save();
        return redirect()->back()->with('success',"Category insertion successful");
    }

    public function ShowCat(){
        $category =  Category::latest()->paginate(5);
        return view('admin.category.category',['categories' => $category]);
    }

    public function Edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', ['categories' => $category]);
    }

    public function Update(Request $req,$id){
        $update=   Category::find($id)->update([
            'user_id'=> Auth::user()->id,
            'category_name'=>$req->category_name
        ]);
        return redirect()->route('all.category')->with('success','Category Updated Successfully');
    }

    public function Trash(){
        $trashCan = Category::onlyTrashed()->latest()->paginate(5);
        return view('admin.category.trash',['trashCan'=>$trashCan]);

    }

    public function SoftDeletes($id){
        $softDeletes = Category::find($id)->delete();
        return redirect()->route('trash.category')->with('success','Moved to trash Successful');
    }

    public function Restore($id){
        $category = Category::withTrashed()->find($id)->restore();
        return redirect()->route('all.category')->with('success','Category restored successfully');
    }

    public function Delete($id){
        $category = Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('all.category')->with('success','Category Deleted successfully');
    }
}
