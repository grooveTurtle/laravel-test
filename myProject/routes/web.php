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

//process parameters use regex
Route::get('users/{id}', function($id = 'fallbackId') {
    //
})->where('id', '[0-9]+');

Route::get('users/{username}', function($username) {
    //
})->where('username', '[A-Za-z]+');

Route::get('posts/{id}/{slug}', function ($id, $slug) {
    //
})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z]+']);


// route nickname
Route::get('members/{userId}/comments/{commentId}', [MemberController::class, 'show'])->name('members.show');
// possible output specific route url
// in view -> echo route('members.show' ['userId' => 14]);
// expect https://{}

// route function parameter send example
// route('members.show', [1,2])
// route('members.show', ['userId' => 1, 'commentId' => 2]) // key 값 기재시 순서 상관 X
// route('members.show', ['userId' => 1, 'commentId' => 2, 'opt' => 'a']) // output -> users/1/comments/2?opt=a

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

// view에 데이터 전달하기
// Route::get('tasks', function() {
//     return view('tasks.index')
//             ->with('tasks', Task::all());
// });


// did not match any routes
Route::fallback(function() {
    return 'sorry';
});

// before laravel 5.6
// Route::any('{anything}', 'CatchAllController')->where('anything', '*');
