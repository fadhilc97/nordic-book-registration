@extends('layout')

@section('container-fluid')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Book</h1>
</div>

<!-- Content Row -->
<div class="form-group row">
    <label for="code" class="col-sm-2 col-form-label">Code</label>
    <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" id="code" value="{{ $book->code }}">
    </div>
</div>
<div class="form-group row">
    <label for="owner" class="col-sm-2 col-form-label">Owner</label>
    <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" id="owner" value="{{ $book->owner }}">
    </div>
</div>
<div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" id="phone" value="{{ $book->phone }}">
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" id="email" value="{{ $book->email }}">
    </div>
</div>
<div class="form-group">
    <a class="btn btn-warning btn-sm col-sm-1" href="/books/{{ $book->id }}/edit">Update</a>
    <form action="/books/{{ $book->id }}" class="d-inline ml-3" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger btn-sm col-sm-1"  onclick="return confirm('Are you sure to continue ?');">Delete</button>
    </form>
</div>
@endsection