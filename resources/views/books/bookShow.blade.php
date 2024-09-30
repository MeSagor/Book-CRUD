@extends('layouts.masterLayout')


@section('content')
<div>
    <h1 class="text-center mb-4 mt-2">Book Details</h1>
    <div class="container w-50">
        <div class="card">
            <div class="card-header">
                <h3>{{ $book->title }}</h3>
            </div>
            <div class="card-body">
                <p>Author: {{ $book->author }}</p>
                <p>ISBN: {{ $book->isbn }}</p>
                <p>Stock: {{ $book->stock }}</p>
                <p>Price: ${{ $book->price }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
