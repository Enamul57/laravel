<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
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
    return view('index');
});
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













//email verification default route from documentation
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    $users = User::all();
    return view('admin.index',['users'=>$users]);
})->name('dashboard');


