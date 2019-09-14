<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
class FrontController extends Controller
{
    public function home()
    {
    	$products=Product::all();
    	return view('front.home',compact('products'));
    }
}
