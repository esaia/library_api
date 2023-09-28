<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
	public function index(Request $request)
	{
		$query = $request['query'];

		if ($query) {
			$books = Book::where('name', 'like', "%$query%")
				->orWhereHas('authors', function ($authorQuery) use ($query) {
					$authorQuery->where('name', 'like', "%$query%");
				})
				->get();
		} else {
			$books = Book::all();
		}

		return view('dashboard', compact('books'));
	}

	public function show(Book $book)
	{
		return $book;
	}

	public function store(BookStoreRequest $request)
	{
		$credentials = $request->validated();

		$author_ids = $credentials['authors'];
		$status = $credentials['status'] === 'Free';

		try {
			$book = Book::create([
				'name'  => $credentials['name'],
				'year'  => $credentials['year'],
				'status'=> $status,
			]);

			$book->authors()->attach($author_ids);

			return to_route('book.dashboard');
		} catch (\Exception $e) {
			return back()->with('error', 'An error occurred while storing the book.');
		}
	}

	public function edit(Book $book)
	{
		$authors = Author::all();

		return view('book.edit', compact('book', 'authors'));
	}

	public function update(Book $book, BookStoreRequest $request)
	{
		$credentials = $request->validated();

		$author_ids = $credentials['authors'];
		$status = $credentials['status'] === 'Free';

		try {
			$book->update([
				'name'  => $credentials['name'],
				'year'  => $credentials['year'],
				'status'=> $status,
			]);

			$updatedBook = Book::find($book->id);
			$updatedBook->authors()->sync($author_ids);

			return to_route('book.dashboard');
		} catch (\Exception $e) {
			return back()->with('error', 'An error occurred while editing the book.');
		}
	}

	public function destroy(Book $book)
	{
		try {
			$book->delete();
			return back();
		} catch (\Exception $e) {
			return back()->with('error', 'An error occurred while deleting the book.');
		}
	}
}
