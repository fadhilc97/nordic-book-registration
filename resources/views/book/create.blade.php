@extends('layout')

@section('container-fluid')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Book</h1>
</div>

<!-- Content Row -->
<form action="/books" method="POST">
    @csrf
    <div class="form-group row">
        <label for="code" class="col-sm-2 col-form-label">Code</label>
        <div class="col-sm-10">
            <input class="form-control col-sm-3" readonly name="code" type="text" id="code" value="{{ old('code', $default_code) }}">
            @error('code')  
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="owner" class="col-sm-2 col-form-label">Owner</label>
        <div class="col-sm-10">
            <input class="form-control col-sm-3" name="owner" type="text" id="owner" value="{{ old('owner') }}">
            @error('owner')  
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input class="form-control col-sm-3" name="phone" type="text" id="phone" value="{{ old('phone') }}">
            @error('phone')  
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input class="form-control col-sm-3" name="email" type="text" id="email" value="{{ old('email') }}">
            @error('email')  
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-success btn-sm col-sm-1">Save</button>
        <a href="/books" class="btn btn-danger btn-sm col-sm-1">Cancel</a>
    </div>
</form>
@endsection