<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
class CategoryController extends Controller
{
        //verify
        public function __construct(){
            $this->middleware('auth');
         }
    
         

         
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
        $notification= ['alert-type' =>'success',
        'message' => ' Profile Information changed Successfully'];
        return redirect()->back()->with( $notification);
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
        $notification= ['alert-type' =>'success',
        'message' => ' Updated Successfully'];
        return redirect()->route('all.category')->with( $notification);
    }

    public function Trash(){
        $trashCan = Category::onlyTrashed()->latest()->paginate(5);
        return view('admin.category.trash',['trashCan'=>$trashCan]);

    }

    public function SoftDeletes($id){
        $softDeletes = Category::find($id)->delete();
        $notification= ['alert-type' =>'success',
        'message' => ' Move to trash successfully'];
        return redirect()->route('trash.category')->with( $notification);
    }

    public function Restore($id){
        $category = Category::withTrashed()->find($id)->restore();
        $notification= ['alert-type' =>'success',
        'message' => ' Restored Successfully'];
        return redirect()->route('all.category')->with( $notification);
    }

    public function Delete($id){
        $category = Category::onlyTrashed()->find($id)->forceDelete();
        $notification= ['alert-type' =>'Warning',
        'message' => 'Category Deleted successfully'];
        return redirect()->route('all.category')->with( $notification);
    }
}
