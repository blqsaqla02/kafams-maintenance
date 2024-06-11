<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\profileController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('results', ResultController::class);

Route::get('/profile', [profileController::class, 'index'])->name('profile.index');
Route::get('/profile/create',[profileController::class, 'create'])->name('profile.create');
Route::get('/store',[profileController::class, 'create'])->name('profile.create');
Route::post('/store',[profileController::class, 'store'])->name('profile.store');
//Route::delete('LabAsset/{assetDetail}', [profileController::class, 'destroy'])->name('assets.destroy');

Route::get('kafa-activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/bulletin', [BulletinController::class, 'index'])->name('bulletin.index');

