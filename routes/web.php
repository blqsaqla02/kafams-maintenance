<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//home
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/admin', [HomeController::class, 'index'])->name('home.admin');
Route::get('/home/student', [HomeController::class, 'index'])->name('home.student');
Route::get('/home/parent', [HomeController::class, 'index'])->name('home.parent');
//result
Route::resource('results', ResultController::class);

//bulletin
Route::get('/bulletin/admin', [BulletinController::class, 'indexAdmin'])->name('bulletin.indexBulletinAdmin');
Route::get('/bulletin', [BulletinController::class, 'index'])->name('bulletin.indexBulletin');
Route::get('/bulletin/admin/create', [BulletinController::class, 'create'])->name('bulletin.createBulletin');
Route::post('/bulletin/admin/create/store', [BulletinController::class, 'store'])->name('bulletin.store');
Route::get('/bulletin/admin/edit/{id}', [BulletinController::class, 'edit'])->name('bulletin.updateBulletin');
Route::post('/bulletin/admin/update/{id}', [BulletinController::class, 'update'])->name('bulletin.update');
Route::delete('/bulletin/admin/delete/{id}', [BulletinController::class, 'destroy'])->name('bulletin.destroy');
// Route::get('/bulletin/admin/edit', [BulletinController::class, 'edit'])->name('bulletin.updateBulletin');
// Route::get('/bulletin/admin/delete', [BulletinController::class, 'delete'])->name('bulletin.deleteBulletin');
//asing kan ye

//profile
Route::get('/profile', [profileController::class, 'index'])->name('profile.index');
Route::get('/profile/index2', [profileController::class, 'index2'])->name('profile.index2');
Route::get('/profile/create',[profileController::class, 'create'])->name('profile.create');
Route::get('/profiles/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/view/{id}', [profileController::class, 'view'])->name('profile.view');
Route::get('/profile/edit/{id}', [profileController::class, 'edit'])->name('profile.edit');
Route::post('/store',[profileController::class, 'store'])->name('profile.store');
Route::put('/profiles/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/delete/{id}', [profileController::class, 'destroy'])->name('profile.destroy');
// Route::post('/profile/update/{id}', [profileController::class, 'update'])->name('profile.update');
// Route::get('/profile/edit', [profileController::class, 'edit'])->name('profile.edit');
//Route::get('/profile/index2/{id}', [ProfileController::class, 'index2'])->name('profile.index2')
// Route::get('/create',[profileController::class, 'create'])->name('profile.create');;


//Past KAFA activities
// Route::get('kafa-activities', [ActivityController::class, 'index'])->name('activities.index');


//New KAFA activities
Route::prefix('/kafa-activities')->group(function() {
    Route::get('/', [ActivityController::class, 'index'])->name('activities.main');
    Route::get('/{type}', [ActivityController::class, 'view'])->name('activity.viewActivity');
    Route::get('/view/{type}/{activity}', [ActivityController::class, 'viewActivity'])->name('activity.viewActivityFile');
    Route::get('/add/{type}', [ActivityController::class, 'addform'])->name('activity.addActivity');
    Route::post('/add/{type}/submit', [ActivityController::class, 'submitform'])->name('activity.submit');
    Route::get('/edit/{type}/{activity}', [ActivityController::class, 'edit'])->name('activity.editActivity');
    Route::post('/edit/{type}/{activity}/update', [ActivityController::class, 'updateForm'])->name('activity.updateActivity');
    Route::delete('/delete/{type}/{activity}', [ActivityController::class, 'destroy'])->name('activity.deleteActivity');
})->middleware('auth');


use App\Http\Controllers\Auth\ForgotPasswordController;
Route::get('/password/reset', [ForgotPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/password/reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

use App\Http\Controllers\AdminProfileController;
Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('profile.admin');
    Route::post('/admin/profile', [AdminProfileController::class, 'update']);
});

use App\Http\Controllers\ParentProfileController;
Route::middleware('auth')->group(function () {
    Route::get('/parent/profile', [ParentProfileController::class, 'index'])->name('profile.parent');
    Route::post('/parent/profile', [ParentProfileController::class, 'update']);
});