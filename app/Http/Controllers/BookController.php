<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(8);

        // dd($books);
        return view('books.bookHomePage', compact('books'));
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('books.bookShow', compact('book'));
    }

    public function create()
    {
        return view('books.bookCreate');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required | numeric | gte:13',
            'stock' => 'required | numeric | min:0',
            'price' => 'required | numeric | min:0',
        ];
        $request->validate($rules);
//        dd($request->all());

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        $book->price = $request->price;
        $book->save();
        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.bookEdit', compact('book'));
    }

    public function update(Request $request)
    {
        $rules = [
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required | numeric | digits: 13',
            'stock' => 'required | numeric | min:0',
            'price' => 'required | numeric | min:0',
        ];
        $request-> validate($rules);

        $book = Book::find($request->id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        $book->price = $request->price;
        $book->save();
        return redirect()->route('books.index');
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }

    public function search(Request $request)
    {
//        dd($request->all());
        $books = Book::where('title', 'like', '%'.$request->search.'%')
            ->orWhere('author', 'like', '%'.$request->search.'%')
            ->paginate(8)
            ->appends(['search' => $request->search]);
        return view('books.bookHomePage', compact('books'));
    }

}
