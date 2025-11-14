<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\userController;

Route::get('/', [homeController::class, "show"])->name("home");

Route::get('/login-page', [userController::class, 'showLogin'])->name("login.show");
Route::post('/login-submit', [userController::class, 'userLogin'])->name("login.submit");
Route::post('/logout', [userController::class, 'logOut'])->name('logout');

Route::get('register-page', [userController::class, 'showRegister'])->name("register.show");
Route::post('register-submit', [userController::class, 'userRegister'])->name("register.submit");

Route::get('/teste', function(){return view('teste');})->name('teste');