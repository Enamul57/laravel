<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Brand;
use App\Models\About;
use App\Models\Gallery;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChangePasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $brand = Brand::get();
    $about = About::get();
    $gallery = Gallery::get();
    return view('index',['brands'=>$brand,'abouts'=>$about,'galleries'=>$gallery]);
})->name('home');

Route::get('category/all',[CategoryController::class,'index'])->name('all.category');
Route::post('category/store',[CategoryController::class,'AddCat'])->name('store.category');
Route::get('category/all',[CategoryController::class,'ShowCat'])->name('all.category');
Route::get('category/edit/{id}',[CategoryController::class,'Edit']);
Route::post('category/update/{id}',[CategoryController::class,"Update"]);
Route::get('category/trash',[CategoryController::class,'Trash'])->name('trash.category');
Route::get('category/softdeletes/{id}',[CategoryController::class,'SoftDeletes']);
Route::get('category/restore/{id}',[CategoryController::class,'Restore']);
Route::get('category/delete/{id}',[CategoryController::class,'Delete']);

Route::get('brand/show',[BrandController::class,'Show'])->name('show.brand');
Route::post('brand/store',[BrandController::class,'Store']);
Route::get('brand/edit/{id}',[BrandController::class,'Edit']);
Route::post('brand/update',[BrandController::class,'Update'])->name('update.brand');
Route::get('brand/delete/{id}',[BrandController::class,'Delete']);

Route::get('gallery',[GalleryController::class,'Show'])->name('show.gallery');
Route::post('gallery/store',[GalleryController::class,'Store']);

Route::get('logout',[AdminController::class,'logout']);

Route::get('admin/slider',[SliderController::class,'show'])->name('slider.show');
Route::get('admin/slider/add',[SliderController::class,'add'])->name('slider.add');
Route::post('admin/slider/store',[SliderController::class,'store'])->name('slider.store');
Route::get('admin/slider/edit/{id}',[SliderController::class,'edit']);
Route::get('admin/slider/delete/{id}',[SliderController::class,'delete']);
Route::post('admin/slider/update',[SliderController::class,'update']);

Route::get('admin/home/about',[AboutController::class,'index'])->name('home.about');
Route::get('admin/about/add',[AboutController::class,'Add']);
Route::post('admin/about/store',[AboutController::class,'Store']);
Route::get('about/edit/{id}',[AboutController::class,'edit']);
Route::get('about/delete/{id}',[AboutController::class,'delete']);
Route::post('about/update',[AboutController::class,'update']);

Route::get('portfolio',[PortfolioController::class,'index'])->name('portfolio');

Route::get('Contactpage',[ContactController::class,'index'])->name('contact.page');
Route::get('admin/contactaccount',[ContactController::class,'contact_account'])->name('contact.profile');
Route::get('admin/contactform',[ContactController::class,'addContact'])->name('contact.form');

Route::get('contactaccount/edit/{id}',[ContactController::class,'editContact']);
Route::post('contactaccount/update',[ContactController::class,'updateContact'])->name('contact.post');
Route::get('contactaccount/delete/{id}',[ContactController::class,'deleteContact']);

Route::get('contact/trashList',[ContactController::class,'trashList']);
Route::get('contactaccount/softdelete/{id}',[ContactController::class,'softdeleteContact'])->name('msg_softdelete');
Route::get('contactaccount/restore/{id}',[ContactController::class,'restore'])->name('msg_restore');
Route::get('contactaccount/forcedelete/{id}',[ContactController::class,'delete'])->name('msg_delete');



route::post('contactform/store',[ContactController::class,'contactstore'])->name('contact.store');
route::post('contactmessage/store',[ContactController::class,'msgstore'])->name('contact.message');
route::get('adminmessage',[ContactController::class,'msgreceive'])->name('admin.message');

//email verification default route from documentation
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('admin/change-password',[ChangePasswordController::class,'changePassTemplate'])->name('change.password');
Route::post('admin/update-password',[ChangePasswordController::class,'updatePass'])->name('update.password');


Route::get('admin/view-profile',[AdminController::class,'edit'])->name('edit.profile');
Route::post('admin/update-profile',[AdminController::class,'update'])->name('update.profile');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    $users = User::all();
    return view('admin.index',['users'=>$users]);
})->name('dashboard');



