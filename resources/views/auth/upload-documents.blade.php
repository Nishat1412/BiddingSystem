@extends('auth.layout')
@section('title', 'Upload Documents')
@section('content1')
<div class="container py-4">
  <h3 class="heading mb-4"> Upload Documents </h3>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
      </div>
  @endif

  <div class="container-documents">
      <form action="{{ route('upload.submit') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group mb-3">
          <label>National Identity Card</label>
          <input type="file" name="identity_card" class="form-control" required>
      </div>

      <div class="form-group mb-3">
          <label>Birth Certificate / Passport</label>
          <input type="file" name="birth_certificate_or_passport" class="form-control" required>
      </div>

      <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <a href="{{ route('register.create') }}" class="btn btn-secondary">Cancel</a>
      </div>
  </form>
  </div>

</div>
@endsection
