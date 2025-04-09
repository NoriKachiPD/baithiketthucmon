@extends('admin.master')

@section('title', 'Edit Category')

@section('favicon', asset('images/Dish.jpg'))

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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.category.edit', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="name" value="{{ old('name', $category->name) }}" required />
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Category Image</label>
                        <input type="file" class="form-control" name="image" />
                        @if($category->image)
                            <p style="margin-top: 10px;">Current image:</p>
                            <img src="{{ asset('source/image/product/'.$category->image) }}" width="100" height="auto" alt="Current Image" />
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Update Category</button>
                    <a href="{{ route('admin.category.list') }}" class="btn btn-secondary" style="margin-left: 10px;">Back to List</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection