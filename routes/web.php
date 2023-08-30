<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentSettingController;
use App\Http\Controllers\SchoolProfileController;

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
Route::view('/', 'frontsite.pages.home.index');

Route::middleware('auth')->group( function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::view('/dashboard', 'backsite.pages.dashboard.index');

    Route::get('/content_settings/list', [ContentSettingController::class, 'list'])->name('content_settings.list');
    Route::get('/content_settings/create', [ContentSettingController::class, 'create'])->name('content_settings.create');
    Route::post('/content_settings/store',[ContentSettingController::class, 'store'])->name('content_settings.store');

    Route::get('/profile-sekolah',[SchoolProfileController::class,'index']);
    Route::post('/profile-sekolah-store',[SchoolProfileController::class,'store']);
});
