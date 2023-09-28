<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Models\Author;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->as('user.')->group(function () {
	Route::post('/login', 'login')->name('login');
	Route::post('/register', 'store')->name('store');
	Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
	Route::controller(BookController::class)->as('book.')->group(function () {
		Route::get('/', 'index')->name('dashboard');

		Route::view('/books/create', 'book.create', ['authors' => Author::all()])->name('create');
		Route::get('/books/{book}', 'show')->name('show');
		Route::post('/books', 'store')->name('store');
		Route::put('/books/{book}', 'update')->name('update');
		Route::get('/books/{book}/edit', 'edit')->name('edit');
		Route::delete('/books/{book}', 'destroy')->name('destroy');
	});
});

Route::middleware('guest')->group(function () {
	Route::view('/login', 'auth.login')->name('login');
	Route::view('/register', 'auth.register')->name('register');
});
