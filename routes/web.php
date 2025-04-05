<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminLoginMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PageController::class, 'getIndex'])->name('home');

Route::get('/trangchu',[PageController::class,'getIndex'])->name('banhang.index');

Route::get('/chitiet/{sanpham_id}',[PageController::class,'getChiTiet'])->name('banhang.chitiet');

Route::get('/add-to-cart/{id}',[PageController::class,'addToCart'])->name('banhang.addtocart');

Route::get('/del-cart/{id}',[PageController::class,'delCartItem'])->name('banhang.xoagiohang');

Route::get('/checkout',[PageController::class,'getCheckout'])->name('banhang.getdathang');
Route::post('/checkout',[PageController::class,'postCheckout'])->name('banhang.postdathang');

Route::get('/contacts', function () {
    return view('page.contacts');
})->name('contacts');

Route::get('/product', function () {
    return view('page.product');
})->name('product');

Route::get('/page.dangky',[PageController::class,'getSignin'])->name('getsignin');
Route::post('/page.dangky',[PageController::class,'postSignin'])->name('postsignin');
Route::get('/logout', [App\Http\Controllers\PageController::class, 'logout'])->name('getlogout');
Route::get('/page.dangnhap',[PageController::class,'getLogin'])->name('getlogin');
Route::post('/pagedangnhap',[PageController::class,'postLogin'])->name('postlogin');

// Route::prefix('admin')->group(function () {
//     Route::get('/category', [CategoryController::class, 'getCateList'])->name('admin.category.list');
//     Route::get('/list', [CategoryController::class, 'getCateList'])->name('admin.category.list');
//     Route::get('/add', [CategoryController::class, 'getAddCate'])->name('admin.category.add');
//     Route::post('/add', [CategoryController::class, 'postAddCate'])->name('admin.category.postAdd');
//     Route::get('/edit/{id}', [CategoryController::class, 'getEditCate'])->name('admin.category.edit');
//     Route::post('/edit/{id}', [CategoryController::class, 'postEditCate'])->name('admin.category.postEdit');
//     Route::get('/delete/{id}', [CategoryController::class, 'deleteCate'])->name('admin.category.delete');
// });

// // Route hiển thị form sửa danh mục
// Route::get('/admin/category/edit/{id}', [CategoryController::class, 'getEditCate'])->name('admin.category.edit');

// // Route xử lý cập nhật danh mục (dùng phương thức PUT)
// Route::put('/admin/category/edit/{id}', [CategoryController::class, 'postEditCate']);

// // Hiển thị form thêm danh mục
// Route::get('admin/category/add', [CategoryController::class, 'create'])->name('admin.category.add');

// // Xử lý form thêm danh mục
// Route::post('admin/category/add', [CategoryController::class, 'store'])->name('admin.category.store');

// Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
//     Route::group(['prefix' => 'category'], function () {
//         Route::get('danhsach', [CategoryController::class, 'getCateList'])->name('admin.getCateList');
//         Route::get('them', [CategoryController::class, 'getCateAdd'])->name('admin.getCateAdd');
//         Route::post('them', [CategoryController::class, 'postCateAdd'])->name('admin.postCateAdd');
//         Route::get('xoa/{id}', [CategoryController::class, 'getCateDelete'])->name('admin.getCateDelete');
//         Route::get('sua/{id}', [CategoryController::class, 'getCateEdit'])->name('admin.getCateEdit');
//         Route::post('sua/{id}', [CategoryController::class, 'postCateEdit'])->name('admin.postCateEdit');
//     });
// });


Route::prefix('admin')->middleware([AdminLoginMiddleware::class])->group(function () {

    // Route cho danh sách
    Route::get('/list', [CategoryController::class, 'getCateList'])->name('admin.category.list');

    // Route thêm danh mục (cả tiếng Anh và tiếng Việt nếu cần)
    Route::get('/add', [CategoryController::class, 'getAddCate'])->name('admin.category.add');
    Route::post('/add', [CategoryController::class, 'postAddCate'])->name('admin.category.postAdd');

    Route::get('/category/add', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/add', [CategoryController::class, 'store'])->name('admin.category.store');

    // Route chỉnh sửa
    Route::get('/edit/{id}', [CategoryController::class, 'getEditCate'])->name('admin.category.edit');
    Route::post('/edit/{id}', [CategoryController::class, 'postEditCate'])->name('admin.category.postEdit');

    Route::get('/category/edit/{id}', [CategoryController::class, 'getEditCate'])->name('admin.category.edit.form');
    Route::put('/category/edit/{id}', [CategoryController::class, 'postEditCate'])->name('admin.category.edit.put');

    // Xóa
    Route::get('/delete/{id}', [CategoryController::class, 'deleteCate'])->name('admin.category.delete');

    // Nếu bạn vẫn muốn giữ route tiếng Việt:
    Route::prefix('category')->group(function () {
        Route::get('danhsach', [CategoryController::class, 'getCateList'])->name('admin.getCateList');
        Route::get('them', [CategoryController::class, 'getCateAdd'])->name('admin.getCateAdd');
        Route::post('them', [CategoryController::class, 'postCateAdd'])->name('admin.postCateAdd');
        Route::get('xoa/{id}', [CategoryController::class, 'getCateDelete'])->name('admin.getCateDelete');
        Route::get('sua/{id}', [CategoryController::class, 'getCateEdit'])->name('admin.getCateEdit');
        Route::post('sua/{id}', [CategoryController::class, 'postCateEdit'])->name('admin.postCateEdit');
    });

});