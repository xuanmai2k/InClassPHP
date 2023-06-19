<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
    return '<h1>Home</h1>';
})->name('home');

Route::get('/cocacola', function () {
    return '<h1>Cocacola</h1>';
})->name('cocacola');

Route::get('/chivas', function () {
    return '<h1>Chivas</h1>';
})->name('chivas')->middleware('auth.adult');

Route::middleware('auth.admin')->name('admin.')->group(function () {
    Route::get('/admin', function () {
        return view('admin.pages.dashboard');
    })->name('admin');

    Route::get('/admin/user', function () {
        return view('admin.pages.user');
    })->name('user');

    Route::get('/admin/blog', function () {
        return view('admin.pages.blog');
    })->name('blog');

    Route::get('/admin/product', function () {
        return view('admin.pages.product');
    })->name('product');
});

require __DIR__.'/auth.php';
