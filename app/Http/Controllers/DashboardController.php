<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function reader()
    {
        $books = Book::where('status', 'approved')->latest()->take(10)->get();
        $myRentals = Auth::user()->rentals()->with('book')->whereNull('returned_at')->get();
        
        return view('dashboard.reader', compact('books', 'myRentals'));
    }

    public function author()
    {
        $myBooks = Auth::user()->books()->latest()->get();
        // Mock stats for now
        $stats = [
            'total_books' => $myBooks->count(),
            'total_sales' => 0,
            'total_rentals' => 0,
        ];

        return view('dashboard.author', compact('myBooks', 'stats'));
    }

    public function librarian()
    {
        $pendingBooks = Book::where('status', 'pending')->latest()->get();
        $allBooks = Book::latest()->paginate(20);

        return view('dashboard.librarian', compact('pendingBooks', 'allBooks'));
    }

    public function admin()
    {
        $users = User::with('roles')->latest()->paginate(20);
        
        return view('dashboard.admin', compact('users'));
    }
}
