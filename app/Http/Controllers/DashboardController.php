<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    public function index() {
        return view('index', [
            'no_of_books' => Book::count()
        ]);
    }
}
