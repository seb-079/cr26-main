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

use App\Http\Controllers\c_insertion_score;

//Selection concours 
Route::get('/pages/insertion_score', [c_insertion_score::class, 'selectConcours'])
    ->name('insertion_score.select');

// enregistrer concours choisi
Route::post('/pages/insertion_score/choisir', [c_insertion_score::class, 'concoursChoisi'])
    ->name('insertion_score.choisir');

// formulaire saisi score
Route::get('/pages/insertion_score/form', [c_insertion_score::class, 'form'])
    ->name('insertion_score.form');

// sauvegarde saisi score
Route::post('/pages/insertion_score/save', [c_insertion_score::class, 'save'])
    ->name('insertion_score.save');
