<?php


use Features\Auth\Http\Controllers\RegisterController;
use Features\Auth\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {

    Route::post('login', [LoginController::class, 'login'])->name('auth.login');
    Route::post('register', [RegisterController::class, 'register'])->name('auth.register');

});
