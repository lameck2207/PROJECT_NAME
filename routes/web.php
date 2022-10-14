<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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
// all listings
Route::get('/', [ListingController::class, 'index'] );

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware('auth');

// Delete listing Listing
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'])->middleware('auth');

// Listings Manage
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->middleware('guest');

// Log in User
Route::post('/user/authenticate', [UserController::class, 'authenticate']);























Route::get('/dbconn', function() {
    return view('/dbconn');
});
