<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentSettingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegistrationScheduleController;
use App\Http\Controllers\SchoolProfileController;
use App\Http\Controllers\StudentRegistrationController;
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
Route::get('/', [App\Http\Controllers\Frontsite\HomeController::class, 'index']);
Route::get('/articles/', [App\Http\Controllers\Frontsite\HomeController::class, 'articles']);
Route::get('/detail-article/{slug}', [App\Http\Controllers\Frontsite\HomeController::class, 'articleDetail']);

Route::post('/city', [RegionController::class, 'getCityByProvinceID']);
Route::post('/district', [RegionController::class, 'getDistrictByCityID']);
Route::post('/village', [RegionController::class, 'getVillageByDistrictID']);

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

    Route::get('/register-schedule', [RegistrationScheduleController::class, 'index'])->name('register-schedule.index');
    Route::get('/register-schedule/create', [RegistrationScheduleController::class, 'create'])->name('register-schedule.create');
    Route::post('/register-schedule/store', [RegistrationScheduleController::class, 'store'])->name('register-schedule.store');
    Route::get('/register-schedule/edit/{id}', [RegistrationScheduleController::class, 'edit'])->name('register-schedule.edit');
    Route::patch('/register-schedule/update/{id}', [RegistrationScheduleController::class, 'update'])->name('register-schedule.update');
    Route::delete('/register-schedule/delete/{id}', [RegistrationScheduleController::class, 'destroy'])->name('register-schedule.delete');

    // Route::get('/gallery', [GalleryController::class, 'index']);

    Route::resource('tag', TagController::class);
    Route::patch('tag/update_status/{id}', [TagController::class, 'updateStatus'])->name('tag.update_status');

    Route::resource('category', CategoryController::class);
    Route::patch('category/update_status/{id}', [CategoryController::class, 'updateStatus'])->name('category.update_status');

    Route::resource('article',ArticleController::class);
    Route::patch('article/update_status/{id}', [ArticleController::class, 'updateStatus'])->name('article.update_status');

    Route::get('/student-registration/list', [StudentRegistrationController::class, 'list'])->name('student-registration.list');
    Route::get('/student-registration/detail/{id}', [StudentRegistrationController::class, 'detail'])->name('student-registration.detail');
    Route::patch('/update-status/{id}', [StudentRegistrationController::class, 'updateStatus'])->name('update.status');
    Route::get('/student-registration', [StudentRegistrationController::class, 'index']);
    Route::get('/student-registration-form/{slug}', [StudentRegistrationController::class, 'create']);
    Route::get('/student-registration-form-detail/{id}', [StudentRegistrationController::class, 'edit']);
    Route::post('/student-registration-store', [StudentRegistrationController::class, 'store']);

    Route::get('/banner-list', [BannerController::class, 'list'])->name('banner.list');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::patch('/banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('/banner/delete/{id}', [BannerController::class, 'destroy'])->name('banner.delete');
});
