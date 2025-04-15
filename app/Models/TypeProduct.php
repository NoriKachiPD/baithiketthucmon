<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table = 'type_products'; // tên bảng trong database

    // Nếu bảng không có cột timestamps (created_at, updated_at)
    public $timestamps = false;

    // Nếu bạn có khóa chính không phải là 'id', ví dụ 'id_type', hãy thêm:
    // protected $primaryKey = 'id_type';

    // Liên kết với bảng Product
    public function products()
    {
        return $this->hasMany(Product::class, 'id_type', 'id');
    }
}