<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Lấy danh sách danh mục
    public function getCateList()
    {
        $cates = Category::all();
        return view('admin.category.cate-list', compact('cates'));
    }

    // Hiển thị form sửa danh mục (đảm bảo phương thức này tồn tại)
    public function getEditCate($id)
    {
        $category = Category::find($id); // Lấy thông tin category từ DB
        $cates = Category::all(); // Lấy tất cả các category con để hiển thị
    
        return view('admin.category.cate-edit', compact('category', 'cates'));
    }
    
    public function postEditCate(Request $request, $id)
    {
        $category = Category::find($id); // Lấy category cần sửa
    
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'unit_price' => 'required|numeric',
            'promotion_price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Cập nhật thông tin giá
        $category->name = $request->input('name');
        $category->unit_price = $request->input('unit_price');
        $category->promotion_price = $request->input('promotion_price');
        $category->parent_id = $request->input('parent_id');
        $category->status = $request->input('status');
    
        // Xử lý hình ảnh (nếu có)
        if ($request->hasFile('image')) {
            // Xóa hình cũ nếu có
            if ($category->image && file_exists(public_path('source/image/product/'.$category->image))) {
                unlink(public_path('source/image/product/'.$category->image));
            }
    
            // Lưu hình mới
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('source/image/product'), $imageName);
            $category->image = $imageName;
        }
    
        $category->save(); // Lưu lại dữ liệu
    
        return redirect()->route('admin.category.list')->with('success', 'Category updated successfully!');
    }


    // Hiển thị form thêm danh mục
    public function create()
    {
        return view('admin.category.cate-add'); // Trỏ tới trang thêm danh mục
    }

    // Xử lý form thêm danh mục
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'id' => 'required|unique:categories', // Kiểm tra tính duy nhất của ID
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra ảnh
            'status' => 'required|in:1,2',
        ]);

        // Lưu danh mục mới
        $category = new Category();
        $category->id = $request->input('id');
        $category->name = $request->input('name');
        $category->price = $request->input('price');
        $category->status = $request->input('status');

        // Lưu ảnh nếu có
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->storeAs('public/images', $imageName); // Lưu ảnh vào thư mục public/images
            $category->image = $imageName; // Lưu đường dẫn ảnh vào cơ sở dữ liệu
        }

        $category->save();

        // Redirect đến trang danh sách danh mục với thông báo thành công
        return redirect()->route('admin.category.list')->with('success', 'Category added successfully!');
    }
}
