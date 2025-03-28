<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/trangchu',[PageController::class,'getIndex'])->name('banhang.index');

Route::get('/chitiet/{sanpham_id}',[PageController::class,'getChiTiet'])->name('banhang.chitiet');

Route::get('/add-to-cart/{id}',[PageController::class,'addToCart'])->name('banhang.addtocart');

Route::get('/del-cart/{id}',[PageController::class,'delCartItem'])->name('banhang.xoagiohang');

Route::get('/checkout',[PageController::class,'getCheckout'])->name('banhang.getdathang');
Route::post('/checkout',[PageController::class,'postCheckout'])->name('banhang.postdathang');