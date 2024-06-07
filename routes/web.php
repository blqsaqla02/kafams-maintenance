<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\BulletinController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('results', ResultController::class);

Route::get('profile', [StudentController::class, 'index'])->name('profile.index');
Route::get('kafa-activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/bulletin', [BulletinController::class, 'index'])->name('bulletin.index');

