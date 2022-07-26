<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/posts',[PostController::class,"index"]);
Route::get('/posts/create',[PostController::class,"create"]);
Route::post('/posts/delete',[PostController::class,"delete"]);
Route::post('/posts',[PostController::class,"store"]);
Route::get('/posts/show',[PostController::class,"show"]);
Route::post('/posts/edit',[PostController::class,"edit"]);
Route::post('/posts/update',[PostController::class,"update"]);

Route::post('/comment/index',[CommentController::class,'index']);
Route::post('/comment/create',[CommentController::class,'create']);
Route::post('/comment/store',[CommentController::class,'store']);




require __DIR__.'/auth.php';
