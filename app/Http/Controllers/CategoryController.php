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

    // Hiển thị form sửa danh mục
    public function getEditCate($id)
    {
        $category = Category::find($id);
        return view('admin.category.cate-edit', compact('category'));
    }

    // Xử lý form sửa danh mục
    public function postEditCate(Request $request, $id)
    {
        $category = Category::find($id);

        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category->name = $request->input('name');
        $category->description = $request->input('description');

        // Xử lý ảnh nếu có
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($category->image && file_exists(public_path('source/image/product/'.$category->image))) {
                unlink(public_path('source/image/product/'.$category->image));
            }

            // Lưu ảnh mới
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('source/image/product'), $imageName);
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('admin.category.list')->with('success', 'Danh mục đã được cập nhật thành công!');
    }

    // Hiển thị form thêm danh mục
    public function create()
    {
        return view('admin.category.cate-add');
    }

    // Xử lý form thêm danh mục
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('source/image/product'), $imageName);
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('admin.category.list')->with('success', 'Danh mục đã được thêm thành công!');
    }
}