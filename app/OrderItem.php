<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price', 'total'
    ];

    public function order() {
    	return $this->belongsTo(Order::class, 'order_id');
    }

    public function product() {
    	return $this->belongsTo(Product::class, 'product_id');
    }
}
