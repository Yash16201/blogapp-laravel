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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/viewall', [App\Http\Controllers\HomeController::class, 'showall'])->name('adminview');
Route::post('/search', [App\Http\Controllers\HomeController::class, 'showData'])->name('search');
Route::get('/addblog', [App\Http\Controllers\BlogController::class, 'index'])->name('add');
Route::get('/viewblog/{id}', [App\Http\Controllers\BlogController::class, 'viewblog'])->name('viewblog');
Route::get('/delete/{id}', [App\Http\Controllers\BlogController::class, 'deleteblog'])->name('deleteblog');
Route::get('/edit/{id}', [App\Http\Controllers\BlogController::class, 'editblog'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('update');
Route::post('/postit', [App\Http\Controllers\BlogController::class, 'store'])->name('post');
