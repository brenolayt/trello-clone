<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\todoController;

Route::get('/', [homeController::class, "show"])->name("home");

Route::get('/login', [userController::class, 'showLogin'])->name("login")->middleware('guest');
Route::post('/login/submit', [userController::class, 'userLogin'])->name("login.submit")->middleware('guest');
Route::post('/logout', [userController::class, 'logOut'])->name('logout')->middleware('auth');

Route::get('/register', [userController::class, 'showRegister'])->name("register.show")->middleware('guest');
Route::post('/register-with-email', [userController::class, 'showRegisterWithEmail'])->name('registerEmail.show')->middleware('guest');
Route::post('/register/submit', [userController::class, 'userRegister'])->name("register.submit")->middleware('guest');

Route::get('/profile', [userController::class, 'userProfile'])->name('profile.show')->middleware('auth');
Route::post('/profile/update', [userController::class, 'userUpdate'])->name('profile.update')->middleware('auth');

Route::get('/todo', [todoController::class, 'show'])->name('todo.show')->middleware('auth');

Route::post('/todo/create', [todoController::class, 'create'])->name('todo.create-board')->middleware('auth');
Route::delete('todo/delete/{todo}',[todoController::class, 'delete'])->name('todo.delete-board')->middleware('auth');
Route::post('/todo/create-card/{todoId}', [todoController::class, 'createCard'])->name('todo.create-card')->middleware('auth');
Route::delete('/todo/delete-card/{todoCard}', [todoController::class, 'cardDelete'])->name('todo.delete-card')->middleware('auth');