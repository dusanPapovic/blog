<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

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
// u RouteServiceProvider promeniti za home varijablu u nas url koji redirektuje u ovom slucaju na posts

//za zastitu ruta kada smo ulogovani

Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('post');
    Route::post('/posts', [PostController::class, 'store']);
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('createComment');
    Route::post('/logout', [AuthController::class, 'logout']);
});

//za zastitu ruta kada nismo ulogovani

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'getRegisterForm']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'getLoginBlade'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
