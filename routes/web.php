<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/posts',[PostController::class,"index"]);
Route::get('/posts/create',[PostController::class,"create"]);
Route::get('/posts/{id}',[PostController::class,"show"]);
Route::post('/posts',[PostController::class,"store"]);
Route::get('/posts/{id}',[PostController::class,"edit"]);
Route::put('/posts/edit',[PostController::class,"update"]);
Route::post('/posts/{id}',[PostController::class,"delete"]);

require __DIR__.'/auth.php';
