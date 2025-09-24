<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/mentions_legales', function () {
    return view('mentions_legales');
});
use App\Http\Controllers\TestControroller;
Route::get('/test2', [TestControroller::class, 'index']);


