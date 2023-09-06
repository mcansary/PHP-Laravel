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
    return view('welcome');
});

// NewsController　【PHP/Laravel】07中でmiddlewareを追加
// Route::group(['prefix' => 'admin'],function() {
//     Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
// });

// use App\Http\Controllers\Admin\NewsController;
// Route::controller(NewsController::class)->prefix('admin')->group(function() {
//     Route::get('news/create', 'add');
// });
// // ↑↑↑書き換えられるようになりましょう↓↓↓
// Route::get('/admin/news/create', [NewsController::class, 'add']);

// 【PHP/Laravel】08内でRouting を編集
use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
});
// ↑↑↑書き換え↓↓↓
// use App\Http\Controllers\Admin\NewsController;
// Route::get('/admin/news/create', [NewsController::class, 'add'])->name('news.add');
// Route::post('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
// Route::post('/admin/news/index', [NewsController::class, 'index'])->name('news.index');

// 【PHP/Laravel】04　課題3
// use App\Http\Controllers\AAAController;
// Route::controller(AAAController::class)->group(function() {
//     Route::get('XXX', 'bbb');
// });

// 【PHP/Laravel】04　課題4/middleware('auth')を【PHP/Laravel】07課題2で追記
use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->group(function() {
    Route::get('admin/profile/create', 'add')->middleware('auth');
    Route::get('admin/profile/edit', 'edit')->middleware('auth');
    // 【PHP/Laravel】08課題3で追記
    Route::post('admin/profile/create', 'create')->middleware('auth')->name('admin.profile.create');
    // 【PHP/Laravel】08課題6で追記
    Route::post('admin/profile/edit', 'update')->middleware('auth')->name('admin.profile.edit');
});
//↑↑↑書き換え↓↓↓
// use App\Http\Controllers\Admin\ProfileController;
// Route::get('/admin/profile/create', [ProfileController::class, 'add'])->middleware('auth');
// Route::get('/admin/profile/edit', [ProfileController::class, 'edit'])->middleware('auth');
// Route::post('admin/profile/create', [ProfileController::class, 'create'])->middleware('auth');
// Route::post('admin/profile/edit', [ProfileController::class, 'update'])->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
