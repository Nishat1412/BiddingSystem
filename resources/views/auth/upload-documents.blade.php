@extends('auth.layout')
@section('title', 'Upload Documents')
@section('content1')
<div class="container py-4">
    <h2>Upload Documents</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('upload.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label>National Identity Card</label>
            <input type="file" name="identity_card" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Cash Memo / Invoice</label>
            <input type="file" name="cash_memo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('register.create') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
