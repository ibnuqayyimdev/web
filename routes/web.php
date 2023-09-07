<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentSettingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegistrationScheduleController;
use App\Http\Controllers\SchoolProfileController;
use App\Http\Controllers\TagController;

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
Route::get('/', [App\Http\Controllers\Frontsite\HomeController::class,'index']);

Route::post('/city', [RegionController::class,'getCityByProvinceID']);
Route::post('/district', [RegionController::class,'getDistrictByCityID']);
Route::post('/village', [RegionController::class,'getVillageByDistrictID']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::view('/dashboard', 'backsite.pages.dashboard.index');

    Route::get('/content_settings/list', [ContentSettingController::class, 'list'])->name('content_settings.list');
    Route::get('/content_settings/create', [ContentSettingController::class, 'create'])->name('content_settings.create');
    Route::post('/content_settings/store', [ContentSettingController::class, 'store'])->name('content_settings.store');
    Route::patch('/content_settings/update_status/{id}', [ContentSettingController::class, 'updateStatus'])->name('content_settings.update_status');
    Route::get('/content_settings/edit/{id}', [ContentSettingController::class, 'edit'])->name('content_settings.edit');
    Route::patch('/content_settings/update/{id}', [ContentSettingController::class, 'update'])->name('content_settings.update');
    Route::delete('content_settings/delete/{id}', [ContentSettingController::class, 'destroy'])->name('content_settings.delete');


    Route::get('/profile-sekolah', [SchoolProfileController::class, 'index']);
    Route::post('/profile-sekolah-store', [SchoolProfileController::class, 'store']);

    Route::get('/register-schedule', [RegistrationScheduleController::class, 'index']);
    Route::get('/register-schedule-form/{scheduleId}', [RegistrationScheduleController::class, 'create']);
    Route::post('/register-schedule-store', [RegistrationScheduleController::class, 'store']);

    // Route::get('/gallery', [GalleryController::class, 'index']);

    Route::resource('tag',TagController::class);
    Route::patch('tag/update_status/{id}', [TagController::class, 'updateStatus'])->name('tag.update_status');

    Route::resource('category',CategoryController::class);
    Route::patch('category/update_status/{id}', [CategoryController::class, 'updateStatus'])->name('tag.update_status');
});
