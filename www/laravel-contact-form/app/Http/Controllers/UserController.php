<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

class UserController extends Controller
{
    //
    public function userProductList() {
    	$products = Auth::user()->getProducts();

    	return view('userProductList')->with(['products'=>$products]);
    }
}
