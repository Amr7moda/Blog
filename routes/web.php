<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
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

Route::get('/home', [PagesController::class, 'home']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/dashboard', [PagesController::class, 'dashboard']);
Route::get('profile/{id}', [PagesController::class, 'profile'])->name('web.profile');
Route::get('/logout', [LogoutController::class, 'logout']);

//post_pages
Route::get('/post', [PostController::class, 'post_create']);
Route::post('/post_store', [PostController::class, 'post_store']);
Route::get('/show', [PostController::class, 'post_show']);


Route::get('/home', function () {
    return view('web.home');
});

require __DIR__ . '/auth.php';
