@extends('admin.master')

@section('title', 'Add Category')

@section('favicon', asset('images/Dish.jpg'))

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Add</small>
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

                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="name" placeholder="Enter category name" value="{{ old('name') }}" required />
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Category Image</label>
                        <input class="form-control" type="file" name="image" />
                    </div>

                    <button type="submit" class="btn btn-primary">Add Category</button>
                    <a href="{{ route('admin.category.list') }}" class="btn btn-secondary" style="margin-left: 10px;">Back to List</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection