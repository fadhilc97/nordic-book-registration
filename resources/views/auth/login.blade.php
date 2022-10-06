@extends('auth.layout')

@section('form-content')
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Login to Application</h1>
    </div>
    @error('error')
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @enderror
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="/login" class="user" method="POST">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control form-control-user"
                id="email" aria-describedby="emailHelp"
                placeholder="Email Address" name="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user"
                id="password" placeholder="Password" name="password">
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Login
        </button>
    </form>
    <div class="text-center mt-3">
        <a class="small" href="/register">Create an Account!</a>
    </div>
</div>
@endsection