<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Books;
use App\Http\Livewire\BookCreate;
use App\Http\Livewire\BookUpdate;
use App\Http\Livewire\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get("/books", Books::class)->name('books');
    Route::get("/book/new", BookCreate::class)->name('create_book');
    Route::get("/book/{id}", BookUpdate::class)->name('update_book');
});
