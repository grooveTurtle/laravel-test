<?php

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

Route::get('/', function () {
    // return view('welcome');
    return 'Hello, World';
});

// grouping
Route::prefix('dashboard')->group(function () {
    Route::get('/', function() {
        return 'from /dashboard';
    });
    Route::get('users', function() {
        return 'from /dashboard/users';
    });
});

// grouping - middleware
// Route::prefix('dashboard')->middleware('auth')->group(function () {
//     Route::get('/', function() {
//         return 'apply middleware auth from /dashboard';
//     });
//     Route::get('users', function() {
//         return 'apply middleware auth from /dashboard/users';
//     });
// });


// did not match any routes
Route::fallback(function() {
    return 'sorry';
});