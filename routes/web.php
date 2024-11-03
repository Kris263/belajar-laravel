<?php

use App\Http\Controllers\OuterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/',[OuterController::class, 'index']);

Route::controller(UsersController::class)->group(function () {
    Route::get('/login', 'login_form')->name('login_form');
    Route::post('/login','login_action')->name('login_action');

    Route::get('/dashboard', 'dashboard_index')->name('dashboard_index');
});