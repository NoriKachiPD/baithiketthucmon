<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='products';
    protected $fillable=['name','description','image'];
}
