<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $request) {
    	try {
    		$products = Product::all();
    		return $this->sendResponse(__('auth.login_success'), [
	            'products' => $products
	        ]);
    	} catch(\Exception $e) {
    		return $this->sendError(__('lables.something_went_wrong'), null, 400);
    	}
    }
}
