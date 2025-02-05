<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;


Route::get('/home',[WelcomeController::class,'home'])->name('home');
Route::get('/about',[WelcomeController::class,'about'])->name('about');
Route::get('/store',[WelcomeController::class,'store'])->name('store');
Route::get('/scan',[WelcomeController::class,'scan'])->name('scan');
Route::get('/news',[WelcomeController::class,'news'])->name('news');
Route::get('/daftar',[WelcomeController::class,'daftar'])->name('daftar');


Route::post('/validasi',[WelcomeController::class,'validasi'])->name('validasi');
