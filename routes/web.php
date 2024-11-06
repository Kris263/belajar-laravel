<?php

use App\Http\Controllers\OuterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::controller(OuterController::class)->group(function() {
    Route::get('/','index')->name('home');
    Route::get('/article/{id}', 'article_detail')->name('article_detail');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/login', 'login_form')->name('login_form');
    Route::post('/login','login_action')->name('login_action');

    Route::post('/article/add' , 'article_add_action')->name('article_add_action');
    Route::post('/article/delete' , 'article_delete_action')->name('article_delete_action');


    Route::get('/dashboard', 'dashboard_index')->name('dashboard_index');
    Route::post('/logout', 'dashboard_logout')->name('dashboard_logout');
});