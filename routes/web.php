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
Route::get('/',function(){return view('auth.login');})->name('login');
Route::get('/register',function(){return view('auth.register');})->name('register');
Route::get('/forget-password',function(){return view('auth.forget-password');})->name('forget-password');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function(){return view('admin.dashboard');})->name('dashboard');
    Route::get('/post', function(){return view('admin.post');})->name('post');
});
