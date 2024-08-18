<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//User list all
Route::get('/user/get', [UserController::class,'index']);

//User create a new
Route::post('/user/create', [UserController::class,'create']);

// User show a new
Route::get('/user/show/{id}', [UserController::class,'show']);

//User update
Route::put('/user/update/{id}', [UserController::class,'update']);

//User delete
Route::delete('/user/delete/{id}', [UserController::class,'delete']);

// Product list All
Route::get('/product/list', [ProductController::class,'index']);