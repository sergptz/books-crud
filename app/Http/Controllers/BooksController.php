<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\BookCreateOrUpdateRequest;
use App\Publisher;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        return view('books', ['books' => Book::with(['publisher:id,name', 'author'])->get()->keyBy('id')]);
    }

    public function create()
    {
        return view('crud.create.book', [
            'authors' => Author::all()->keyBy('id'),
            'publishers' => Publisher::all()->keyBy('id'),
            'coverTypes' => Book::COVER_TYPES
        ]);
    }

    public function store(BookCreateOrUpdateRequest $request)
    {
        $data = $request->validated();
        Book::create($data);
        return redirect('books');
    }

    public function show(Book $book)
    {
        return view('crud.show.book', ['book' => $book->load(['publisher:id,name', 'author'])]);
    }

    public function edit(Book $book)
    {
        return view('crud.edit.book', [
            'book' => $book->load(['publisher:id,name', 'author']),
            'authors' => Author::all()->keyBy('id'),
            'publishers' => Publisher::all()->keyBy('id'),
            'coverTypes' => Book::COVER_TYPES,
        ]);
    }

    public function update(BookCreateOrUpdateRequest $request, Book $book)
    {
        $book->update($request->validated());
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back();
    }
}
