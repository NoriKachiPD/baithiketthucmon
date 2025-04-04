@extends('admin.master')

@section('title', 'Edit Category')

@section('favicon', asset(path: 'images/2.jpg'))

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Edit</small>
                </h1>
            </div>

            <div class="col-lg-7" style="padding-bottom:120px">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.category.edit', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Category Parent</label>
                        <select class="form-control" name="parent_id">
                            <option value="0">Please Choose Category</option>
                            @foreach($cates as $cate)
                                <option value="{{ $cate->id }}" {{ $cate->id == $category->parent_id ? 'selected' : '' }}>
                                    {{ $cate->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="name" value="{{ $category->name }}" required />
                    </div>

                    <div class="form-group">
                        <label>Category Price</label>
                        <input class="form-control" name="unit_price" value="{{ $category->unit_price }}" required />
                    </div>

                    <div class="form-group">
                        <label>Discount Price</label>
                        <input class="form-control" name="promotion_price" value="{{ $category->promotion_price }}" />
                    </div>

                    <div class="form-group">
                        <label>Category Image</label>
                        <input type="file" class="form-control" name="image" />
                        <img src="{{ asset('source/image/product/'.$category->image) }}" width="100" height="auto" alt="Current Image" />
                    </div>

                    <div class="form-group">
                        <label>Category Status</label>
                        <label class="radio-inline">
                            <input name="status" value="1" {{ $category->status == 1 ? 'checked' : '' }} type="radio"> Visible
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0" {{ $category->status == 0 ? 'checked' : '' }} type="radio"> Invisible
                        </label>
                    </div>

                    <button type="submit" class="btn btn-default">Update Category</button>
                    <br>
                    <a href="{{ route('admin.category.list') }}" class="btn btn-secondary" style="margin-top: 20px;">Back to List</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection