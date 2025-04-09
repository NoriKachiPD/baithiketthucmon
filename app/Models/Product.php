<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'id_type',
        'description',
        'unit_price',
        'promotion_price',
        'image',
        'unit',
        'top'
    ];

    public $timestamps = true;

    protected $casts = [
        'unit_price' => 'float',
        'promotion_price' => 'float',
        'top' => 'boolean', // Nếu cột top chỉ là true/false, nên thêm cái này
    ];
}