<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [AuthController::class, 'showregister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/welcome', [FormController::class, 'welcome']);

Route::middleware(['auth', IsAdmin::class])->group(function () {
    
    Route::get('/genre/create', [GenreController::class, 'create']);
    Route::post('/genre', [GenreController::class, 'store']);
    Route::get('/genre/{id}/edit', [GenreController::class, 'edit']);
    Route::put('/genre/{id}', [GenreController::class, 'update']);
    Route::delete('/genre/{id}', [GenreController::class, 'destroy']);

    Route::get('/book/create', [BookController::class, 'create']);
    Route::post('/book', [BookController::class, 'store']);
    Route::get('/book/{id}/edit', [BookController::class, 'edit']);
    Route::put('/book/{id}', [BookController::class, 'update']);
    Route::delete('/book/{id}', [BookController::class, 'destroy']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

//genre
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);


//Book
Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);

//comment
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');





// Route untuk halaman profil pengguna (Read)
Route::middleware('auth')->group(function () {
    // Menampilkan profil pengguna
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    
    // Menampilkan halaman untuk edit profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Menyimpan perubahan profil
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Menampilkan halaman untuk tambah profil
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    
    // Menyimpan profil baru
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
});


