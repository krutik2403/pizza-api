<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Order;
use App\OrderItem;
use DB;
use App\Enums\OrderStatus;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            return $this->sendResponse(__('lables.order_list'), [
                'orders' => Order::with(['user', 'items', 'items.product'])->get()
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
        try {
            $validator = Validator::make($request->all(), [
                'customer_name'         => 'required|string',
                'customer_email'        => 'required|email',
                'customer_phone'        => 'required|string|max:20',
                'customer_address_1'    => 'required|string',                
                'customer_address_area' => 'required|string',
                'customer_address_zip'  => 'required|string|max:10',
                'items'                 => 'required|array',
                'items.*.product_id'    => 'required|integer|exists:products,id',
                'items.*.quantity'      => 'required|integer'
            ]);

            if ($validator->fails()) {
                return $this->sendError(__('validation.failed'), $validator->errors(), 400);
            }

            $params = $request->all();
            $order = new Order(Arr::except($params, ['items']));
            DB::transaction(function () use(&$order, $params) {

                $order->status       = OrderStatus::PENDING;
                $order->order_number = date("YmdHis");
                $order->user_id      = auth()->id();
                $order->save();

                $items = [];
                $subtotal = 0;
                foreach ($params['items'] as $item) {
                    $product = Product::find($item['product_id']);
                    $items[] = array_merge($item, [
                        'order_id' => $order->id, 
                        'price' => $product->price,
                        'total' => $product->price * $item['quantity']
                    ]);
                    
                    $subtotal += $product->price * $item['quantity'];
                }

                $order->subtotal = $subtotal;
                $order->delivery_charge = 10;
                $order->tax = 5 * 100 / $subtotal;
                $order->save();

                OrderItem::insert($items);
            });

            return $this->sendResponse(__('lables.order_success'), [
                'order' => $order
            ]);

        } catch(\Exception $e) {
            \Log::error($e);
            return $this->sendError(__('lables.something_went_wrong'), null, 400);
        }
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
            
            $order = Order::find($id);
            if(is_null($order)) {
                return $this->sendError(__('lables.order_not_found'), null, 400);    
            }

            return $this->sendResponse(__('lables.order_detail'), [
                'order' => $order
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
