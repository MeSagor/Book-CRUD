@extends('layouts.masterLayout')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4 mt-2">Books</h1>

        <div class="d-flex justify-content-between">
            <form action="{{route('books.search')}}"  method="GET"  class="d-flex me-2 w-50">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" value="{{ request()->get('search') }}" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href="{{route('books.create')}}" class="btn btn-success">Add Book</a>
        </div>

        <hr>

        @if(!$books->isEmpty())
            <table class="table table-fixed">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>
                            <a href="{{route('books.show', $book->id)}}" class="btn btn-primary">View</a>
                            <a href="{{route('books.edit', $book->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('books.delete', $book->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Sure Delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">No books found</p>
        @endif
        {{$books->links()}}
    </div>
@endsection
