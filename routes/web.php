<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

// Book

Route::get('/',[BookController::class, 'index'])->name('book.index');

Route::get('createbook', [BookController::class, 'create']);

Route::get('/detail/{book}', [BookController::class, 'detail'])->name('book.detail');

Route::post('addbook',[BookController::class,'store'])->name('book.add');

Route::get('/editbook/{book}', [BookController::class, 'edit'])->name('book.edit');

Route::post('/updatebook/{id}', [BookController::class, 'update'])->name('book.update');

Route::delete('/delete/{book}', [BookController::class, 'destroy'])->name('book.delete');



// Author

Route::get('/listauthor',[AuthorController::class, 'index'])->name('author.index');

Route::get('createauthor', [AuthorController::class, 'create']);

Route::post('addauthor',[AuthorController::class,'store'])->name('author.add');

Route::get('/editauthor/{author}', [AuthorController::class, 'edit'])->name('author.edit');

Route::post('/updateauthor/{id}', [AuthorController::class, 'update'])->name('author.update');

Route::delete('/deleteauthor/{author}', [AuthorController::class, 'destroy'])->name('author.delete');


// Category
Route::get('/listcategory',[CategoryController::class, 'index'])->name('category.index');

Route::get('createcategory', [CategoryController::class, 'create']);

Route::post('addcategory',[CategoryController::class,'store'])->name('category.add');

Route::get('/editcategory/{category}', [CategoryController::class, 'edit'])->name('category.edit');

Route::post('/updatecategory/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::delete('/deletecategory/{category}', [CategoryController::class, 'destroy'])->name('category.delete');


