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


use App\Http\Controllers\ScoreController;

//Selection concours 
Route::get('/pages/insertion_score', [ScoreController::class, 'selectConcours'])
    ->name('insertion_score.select');

// enregistrer concours choisi
Route::post('/pages/insertion_score/choisir', [ScoreController::class, 'concoursChoisi'])
    ->name('insertion_score.choisir');

// formulaire saisi score
Route::get('/pages/insertion_score/form', [ScoreController::class, 'concoursActif'])
    ->name('insertion_score.form');

// sauvegarde saisi score
Route::post('/pages/insertion_score/save', [ScoreController::class, 'save'])
    ->name('insertion_score.save');


Route::get('/insertion_score/search', [ScoreController::class, 'searchEquipe'])->name('insertion_score.searchEquipe');

Route::get('/pages/modification_score/liste', [ScoreController::class, 'listeScores'])
    ->name('modif_score.liste');

