<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductFormController extends Controller
{
    //
    public function createProduct(Request $request) {
    	return view('product');
    }

    public function createForm(Request $request) {
    	$this->validate($request,[
    		'name' => 'required'
    	]);
    	
    	return dd($request->user());

    	return back()->with('success','We have created your product');
    }
}
