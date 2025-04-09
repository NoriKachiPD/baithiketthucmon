<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Danh sách sản phẩm
    public function index()
    {
        $products = Product::all();
        return view('admin.product.product-list', compact('products'));
    }

    // Hiển thị form thêm sản phẩm
    public function create()
    {
        $types = [
            (object)['id' => 1, 'name' => '1'],
            (object)['id' => 2, 'name' => '2'],
            (object)['id' => 3, 'name' => '3'],
            (object)['id' => 4, 'name' => '4'],
            (object)['id' => 5, 'name' => '5'],
            (object)['id' => 6, 'name' => '6'],
            (object)['id' => 7, 'name' => '7'],
        ];
    
        return view('admin.product.product-add', compact('types'));
    }

    // Xử lý lưu sản phẩm mới
    // store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_type' => 'required|exists:type_products,id',
            'description' => 'nullable|string',
            'unit_price' => 'required|numeric|min:0',
            'promotion_price' => 'nullable|numeric|min:0',
            'unit' => 'required|string|max:50',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->top = $request->input('top', 0);
        $product->new = $request->input('new', 0);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('source/image/product'), $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('admin.product.list')->with('success', 'Product added successfully.');
    }

    // Hiển thị form sửa sản phẩm
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        // Mảng id_type giả định: 1 đến 7 với tên tương ứng
        $types = [
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7'
        ];
    
        return view('admin.product.product-edit', compact('product', 'types'));
    }

    // Cập nhật sản phẩm// update
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_type' => 'required|exists:type_products,id',
            'description' => 'nullable|string',
            'unit_price' => 'required|numeric|min:0',
            'promotion_price' => 'nullable|numeric|min:0',
            'unit' => 'required|string|max:50',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->top = $request->input('top', 0);
        $product->new = $request->input('new', 0);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('source/image/product'), $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('admin.product.list')->with('success', 'Product updated successfully.');
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path('source/image/product/' . $product->image))) {
            unlink(public_path('source/image/product/' . $product->image));
        }

        $product->delete();

        return redirect()->route('admin.product.list')->with('success', 'Xóa sản phẩm thành công!');
    }
}