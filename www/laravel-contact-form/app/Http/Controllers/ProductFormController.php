<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductFormController extends Controller
{
    //
    public function createProduct(Request $request) {
    	return view('productCreate');
    }

    public function createForm(Request $request) {
    	$this->validate($request,[
    		'name' => 'required'
    	]);

    	Auth::user()->product()->create($request->all());

    	return back()->with('success','We have created your product');
    }

    public function getProductList(Request $request) {
    	$products = Product::all();

    	return view('productList')->with(['products'=>$products]);
    }

    public function getProduct(Request $request, Int $id) {
    	$product = Product::findOrFail($id);

    	return view('product')->with(['product'=>$product]);
    }

    public function getUpdateProduct(Request $request, Int $id) {
    	$product = Product::findOrFail($id);

    	return view('productEdit')->with(['product'=>$product]);
    }

    public function postUpdateProduct(Request $request, Int $id) {
    	$this->validate($request, [
    		'name' => 'required'
    	]);
    	Product::find($id)->update(['name'=>$request->name,'description'=>$request->description]);

    	return back()->with(['success'=>'We have updated your product']);
    }

    public function deleteProduct(Request $request, Int $id) {
    	Product::findOrFail($id)->delete();
    	$message = 'We have deleted your product';

    	return view('productDeleted')->with(['success'=>$message]);
    }
}
