<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'order_number', 'subtotal', 'tax', 'delivery', 'total', 'status', 'customer_name', 'customer_email', 'customer_phone', 'customer_address_1', 'customer_address_2', 'customer_address_area', 'customer_address_pincode'
    ];
}
