<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $params = $request->all();
            $products = Product::query();

            if(array_key_exists('id', $params)) {
                if(is_array($params['id'])) {
                    $products->whereIn('id', $params['id']);
                } else {
                    $products->where('id', $params['id']);
                }
            }

            return $this->sendResponse(__('lables.product_list'), [
                'products' => $products->get()
            ]);
        } catch(\Exception $e) {
            return $this->sendError(__('lables.something_went_wrong'), null, 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            
            $product = Product::find($id);
            if(is_null($product)) {
                return $this->sendError(__('lables.product_not_found'), null, 400);    
            }

            return $this->sendResponse(__('lables.product_detail'), [
                'product' => $product
            ]);
        } catch(\Exception $e) {
            return $this->sendError(__('lables.something_went_wrong'), null, 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
