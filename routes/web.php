<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('vistas.inicio');
});

Route::get('/show', function () {
    return view('vistas.show');
});
