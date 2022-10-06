@extends('auth.layout')

@section('form-content')
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Register New Account</h1>
    </div>
    @error('error')
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @enderror
    <form action="/register" method="POST" class="user">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control form-control-user"
                id="name" aria-describedby="nameHelp"
                placeholder="Your Name" name="name">
            @error('name')  
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-user"
                id="email" aria-describedby="emailHelp"
                placeholder="Email Address" name="email">
            @error('email')  
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user"
                id="password" placeholder="Password" name="password">
            @error('password')  
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user"
                id="password2" placeholder="Confirm Password" name="password2">
            @error('password2')  
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Register
        </button>
    </form>
    <div class="text-center mt-3">
        <a class="small" href="/login">Already have an account ? Login here!</a>
    </div>
</div>
@endsection