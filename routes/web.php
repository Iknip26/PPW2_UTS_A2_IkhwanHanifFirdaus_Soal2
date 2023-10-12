<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::resource('products', Controller::class);
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/posts', [ProductController::class, 'create'])->name('products.create');
Route::post('/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/show/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/update/{id}', [ProductController::class, 'update'])->name('products.update');
