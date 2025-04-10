@extends('admin.master')

@section('title', 'Phản hồi liên hệ')

@section('favicon', asset('images/Contact.jpg'))

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Liên hệ
                    <small>Phản hồi</small>
                </h1>
            </div>

            <div class="col-lg-7" style="padding-bottom:120px">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.contact.replyForm', $contact->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" value="{{ $contact->name }}" disabled />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" value="{{ $contact->email }}" disabled />
                    </div>

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" value="{{ $contact->subject }}" disabled />
                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" rows="4" disabled>{{ $contact->message }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Nội dung phản hồi</label>
                        <textarea class="form-control" name="reply" rows="4" required>{{ old('reply') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
                    <a href="{{ route('admin.contact.list') }}" class="btn btn-secondary" style="margin-left: 10px;">Quay lại danh sách</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection