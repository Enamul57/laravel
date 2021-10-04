<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
class PortfolioController extends Controller
{
    //
    public function __construct(){
       $this->middleware('auth');
    }
    public function index(){
        $gallery = Gallery::get();
        return view('pages.portfolio',['galleries' => $gallery]);
    }
}
