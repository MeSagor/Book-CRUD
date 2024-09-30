@extends('layouts.masterLayout')


@section('content')
<div>
    <h1 class="text-center mb-4 mt-2">Add Book</h1>
    <div class="container w-50">
        <form action="{{route('books.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                <p class="text-danger">{{$errors->first('title')}}</p>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{old('author')}}">
                <p class="text-danger">{{$errors->first('author')}}</p>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="number" class="form-control" id="isbn" name="isbn" value="{{old('isbn')}}">
                <p class="text-danger">{{$errors->first('isbn')}}</p>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{old('stock')}}">
                <p class="text-danger">{{$errors->first('stock')}}</p>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{old('price')}}">
                <p class="text-danger">{{$errors->first('price')}}</p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
