<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'rent_price' => 'nullable|numeric',
            'type' => 'required|in:sell,rent,read_online',
        ]);

        $book = new Book($validated);
        $book->author_id = Auth::id();
        $book->status = 'pending'; // Default status
        $book->save();

        return redirect()->route('dashboard.author')->with('success', 'Book submitted successfully!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
}
