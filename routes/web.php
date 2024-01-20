<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[CustomAuthController::class,'home'])->name('home.index');
Route::get('/register', [CustomAuthController::class, 'register'])->name('register');
Route::post('/register', [CustomAuthController::class, 'authStore'])->name('auth.store');
Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication'])->name('auth.authentication');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('/loginUsers', [CustomAuthController::class, 'loginUsers']);

Route::get('/dashboard1', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::resource('category', CategoryController::class);


Route::group(['middleware'=>'auth', 'prefix'=>'posts'],function(){
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/', [PostController::class, 'store'])->name('post.store');
    // Route::get('/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/{id}', [PostController::class, 'destroy'])->name('post.destroy');

});
Route::get('/recent-post', [PostController::class, 'recentPost'])->name('recent-post');
Route::get('/{id}', [PostController::class, 'show'])->name('post.show');