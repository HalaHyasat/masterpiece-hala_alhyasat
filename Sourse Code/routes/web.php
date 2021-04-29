<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Admin Auth Routes
Route::middleware('auth:admin')->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', 'AdminController@adminIndex');
    Route::resource('/manageAdmin', 'AdminController');
    Route::resource('/manageUser', 'UsersController');
    Route::resource('/managePage', 'PagesController');
    Route::resource('/managePost', 'PostsController');

});

//Login Routes
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::namespace('Admin\Auth')->group(function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login')->name('log-to-admin');
        Route::post('/logout', 'LoginController@logout')->name('logout');
    });
});


//Client Routes
Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@redirect');
    Route::post('/search', 'HomeController@search');
    Route::resource('home', 'HomeController');
    Route::resource('chat', 'ChatController');
    Route::resource('profile', 'ProfileController');
    Route::get('editProfile', 'ProfileController@editProfile');
    Route::resource('pages', 'PageController');
    Route::resource('courses', 'CourseController');

});

Auth::routes();
