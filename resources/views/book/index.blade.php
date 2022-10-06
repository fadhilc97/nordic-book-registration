@extends('layout')

@section('container-fluid')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Books</h1>
</div>

<a href="/books/create" class="btn btn-primary btn-sm mb-3">Create</a>

@if(session('success'))
    <div class="alert alert-success col-sm-3" role="alert">
        {{ session('success') }}
    </div>
@endif

<!-- Content Row -->
<div class="row">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Code</th>
            <th scope="col">Owner</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $book->code }}</td>
                    <td>{{ $book->owner }}</td>
                    <td>{{ $book->phone }}</td>
                    <td>{{ $book->email }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/books/{{ $book->id }}">Info</a>
                        <a class="btn btn-warning btn-sm" href="/books/{{ $book->id }}/edit">Update</a>
                        <form action="/books/{{ $book->id }}" class="d-inline" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure to continue ?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="6" class="text-center">No data available.</th>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection