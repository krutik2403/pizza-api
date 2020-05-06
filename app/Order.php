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
        'user_id', 'order_number', 'subtotal', 'tax', 'delivery_charge', 'total', 'status', 'customer_name', 'customer_email', 'customer_phone', 'customer_address_1', 'customer_address_2', 'customer_address_area', 'customer_address_zip'
    ];

    public function items() {
    	return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function user() {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
