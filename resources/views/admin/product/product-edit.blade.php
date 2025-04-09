@extends('admin.master')

@section('title', 'Edit Product')

@section('favicon', asset('images/Dish.jpg'))

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
                </h1>
            </div>

            <div class="col-lg-7" style="padding-bottom:120px">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.product.edit', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Product Name</label>
                        <input class="form-control" name="name" value="{{ old('name', $product->name) }}" required />
                    </div>

                    <div class="form-group">
                        <label>Product Type</label>
                        <select name="id_type" class="form-control" required>
                            <option value="">-- Select Type --</option>
                            @foreach ($types as $key => $value)
                                <option value="{{ $key }}" {{ old('id_type', $product->id_type) == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Unit Price</label>
                        <input class="form-control" name="unit_price" type="number" step="0.01" value="{{ old('unit_price', $product->unit_price) }}" required />
                    </div>

                    <div class="form-group">
                        <label>Promotion Price</label>
                        <input class="form-control" name="promotion_price" type="number" step="0.01" value="{{ old('promotion_price', $product->promotion_price) }}" />
                    </div>

                    <div class="form-group">
                        <label>Unit</label>
                        <input class="form-control" name="unit" value="{{ old('unit', $product->unit) }}" required />
                    </div>

                    <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" class="form-control" name="image" />
                        @if($product->image)
                            <p style="margin-top: 10px;">Current image:</p>
                            <img src="{{ asset('source/image/product/'.$product->image) }}" width="100" height="auto" alt="Current Image" />
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Top Product</label><br>
                        <label><input type="radio" name="top" value="1" {{ old('top', $product->top) == '1' ? 'checked' : '' }}> Yes</label>
                        <label style="margin-left: 15px;"><input type="radio" name="top" value="0" {{ old('top', $product->top) == '0' ? 'checked' : '' }}> No</label>
                    </div>

                    <div class="form-group">
                        <label>New Product</label><br>
                        <label><input type="radio" name="new" value="1" {{ old('new', $product->new) == '1' ? 'checked' : '' }}> Yes</label>
                        <label style="margin-left: 15px;"><input type="radio" name="new" value="0" {{ old('new', $product->new) == '0' ? 'checked' : '' }}> No</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Product</button>
                    <a href="{{ route('admin.product.list') }}" class="btn btn-secondary" style="margin-left: 10px;">Back to List</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection