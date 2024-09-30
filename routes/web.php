<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index']) -> name('books.index');
Route::get('/books/{id}/show', [BookController::class, 'show']) -> name('books.show');
Route::get('/books/create', [BookController::class, 'create']) -> name('books.create');
Route::post('/books/store', [BookController::class, 'store']) -> name('books.store');
Route::get('/books/{id}/edit', [BookController::class, 'edit']) -> name('books.edit');
Route::put('/books/{id}/update', [BookController::class, 'update']) -> name('books.update');
Route::delete('/books/{id}/delete', [BookController::class, 'delete']) -> name('books.delete');
Route::get('/books/search', [BookController::class, 'search']) -> name('books.search');
