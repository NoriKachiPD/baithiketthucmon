<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'email',
        'address',
        'phone_number',
        'payment_method',
        'product_quantity',
        'order_code',
        'order_date',
        'status',
        'total_price',
        'notes',
    ];

    protected $dates = ['order_date'];
}