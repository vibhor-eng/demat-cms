<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

route::get('/', function(){
    return redirect('admin/login');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::group(['prefix' => 'admin','middleware' => ['auth'],],function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

});

Route::group(['prefix' => 'admin/article','middleware' => ['auth'],],function () {

    Route::get('/list', [App\Http\Controllers\ArticleController::class, 'list'])->name('admin.article.list');
    Route::get('/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('admin.article.create');

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
