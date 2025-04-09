<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Gắn với bảng 'type_products'
    protected $table = 'type_products';

    // Các cột được phép gán giá trị
    protected $fillable = ['name', 'description', 'image'];

    // Nếu bảng có cột created_at và updated_at thì giữ nguyên
    public $timestamps = true;
}