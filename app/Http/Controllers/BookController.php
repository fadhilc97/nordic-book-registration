<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Sequence;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index',[
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $default_code = $this->get_sequence();
        return view('book.create', [
            'default_code' => $default_code
        ]);
    }

    public function get_next_sequence() {
        $sequence = Sequence::where('prefix', 'BOOK')->first();
        $month = date('m');
        $year = date('Y');
        $month_updated = date('m', strtotime($sequence->updated_at));
        $year_updated = date('Y', strtotime($sequence->updated_at));
        $year_month_today = $year.'-'.$month;
        $year_month_updated = $year_updated.'-'.$month_updated;
        $sequence_no = $sequence->sequence;
        if($year_month_today === $year_month_updated) {
            $sequence_no++;
        } else {
            $sequence_no = 1;
        }
        return $sequence_no;
    }

    public function get_sequence() {
        $sequence = Sequence::where('prefix', 'BOOK')->first();
        $next_sequence = $this->get_next_sequence();
        $next_sequence_len = strlen($next_sequence);
        $day = date('d');
        $month = date('m');
        $prefix = $sequence->prefix;
        $padding = $sequence->padding;
        $zeros_len = $padding - $next_sequence_len;
        $sequence_str = str_repeat('0', $zeros_len).$next_sequence;
        return $prefix.'/'.$month.'/'.$day.'/'.$sequence_str;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:books',
            'owner' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable|email'
        ]);
        Book::create($validatedData);
        Sequence::where('prefix', 'BOOK')->update([
            'sequence' => $this->get_next_sequence()
        ]);
        return redirect('/books')->with(['success' => 'Book has been created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.detail', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.update', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'owner' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable|email'
        ]);
        $book->update($validatedData);
        return redirect('/books')->with(['success' => 'Book has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books')->with(['success' => 'Book has been deleted']);
    }
}
