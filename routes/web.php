<?php

use Illuminate\Support\Facades\Route;

Route::get('/{path?}', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
