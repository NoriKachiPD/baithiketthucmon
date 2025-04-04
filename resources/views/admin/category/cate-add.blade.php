@extends('admin.master')

@section('title', 'Add Category')

@section('favicon', asset(path: 'images/2.jpg'))

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

                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>ID</label>
                        <input class="form-control" name="id" placeholder="Please Enter Category ID" required />
                    </div>

                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Category Name" required />
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="price" placeholder="Please Enter Category Price" required type="number" step="0.01" />
                    </div>

                    <div class="form-group">
                        <label>Category Image</label>
                        <input class="form-control" type="file" name="image" />
                    </div>

                    <div class="form-group">
                        <label>Category Status</label>
                        <label class="radio-inline">
                            <input name="status" value="1" checked="" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="2" type="radio">Invisible
                        </label>
                    </div>

                    <button type="submit" class="btn btn-default">Add Category</button>
                    <br>
                    <a href="{{ route('admin.category.list') }}" class="btn btn-secondary" style="margin-top: 20px;">Back to List</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection