<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;

// Placeholder for dashboards
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/reader', [DashboardController::class, 'reader'])->name('dashboard.reader');
    Route::get('/dashboard/author', [DashboardController::class, 'author'])->name('dashboard.author');
    Route::get('/dashboard/librarian', [DashboardController::class, 'librarian'])->name('dashboard.librarian');
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');

    // Book Routes
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create')->middleware('role:author');
    Route::post('/books', [BookController::class, 'store'])->name('books.store')->middleware('role:author');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
});
