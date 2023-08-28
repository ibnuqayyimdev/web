<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', function () {
    return view('frontsite.pages.home.index');
});
Route::get('/dashboard', function () {
    return view('backsite.pages.dashboard.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
