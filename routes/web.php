<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
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

// get data of all products
Route::get('/', [ProductController::class, 'index'])->name('welcome');

// Route to link page welcome page to create page
Route::get('/create', [ProductController::class, 'create'])->name('create');

// Route to store new product in database
Route::post('/store', [ProductController::class,'store'])->name('store');

// Route to show details of a single product
Route::get('/show/{product}', [ProductController::class,'show'])->name('show');

// // Route to link page show page to edit page
Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');

// Route to update product in database
Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');

// Route to delete product from database
Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');

// Route to search for a product
Route::get('/search', [ProductController::class,'search'])->name('search');

?>

