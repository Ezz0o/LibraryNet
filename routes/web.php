<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//main page
Route::get('/', [TagController::class, 'index']);


//User routes
//register user view
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
//register user POST
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

//logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//login user view
Route::get('/login', [UserController::class, 'login'])->middleware('guest');

//login POST
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest')->name('login');

//Show single user
Route::get('/users/{id}', [UserController::class, 'show'])->middleware('auth');

//User delete POST
Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('auth');


//Book and tag routes

//tag POST
Route::post('/tags', [TagController::class, 'store'])->middleware('auth');
//tag edit view
Route::get('/tags/edit/{id}', [TagController::class, 'edit'])->middleware('auth');
//tag PUT
Route::put('/tags/edit/{id}', [TagController::class, 'update'])->middleware('auth');
//tag DELETE
Route::delete('/tags/{id}', [TagController::class, 'destroy'])->middleware('auth');
//Books by tag routes
//In case the user filters by tags
Route::get('/tags/{id}', [TagController::class, 'show']);
//Books by search route
Route::get('/books', [BookController::class, 'index']);

//Books show
Route::get('/books/{id}', [BookController::class, 'show']);

//Books create
Route::get('/book/create', [BookController::class, 'create'])->middleware('auth');

//Books POST
Route::post('/books', [BookController::class, 'store'])->middleware('auth');

//Books update
Route::put('/books/{id}', [BookController::class, 'update'])->middleware('auth');


//Cart Routes

//Cart view
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');

//Add item to cart
Route::post('/cart/{bookid}', [CartController::class, 'store'])->middleware('auth');
Route::delete('/cart/{bookid}', [CartController::class, 'destroy'])->middleware('auth');

//Purchase view
Route::get('/cart/purchase', [CartController::class, 'purchase'])->middleware('auth');

//purchase success view
Route::get('/purchasesuccess', [CartController::class, 'successPurchase'])->middleware('auth');

//Management
//manager panel view
Route::get('/panel', [UserController::class, 'index'])->middleware('auth');
