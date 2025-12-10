<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;
use App\Http\Middleware\CheckRole;

// Pages publiques simples
Route::view('/', 'welcome');
Route::view('/accueil', 'accueil');
Route::view('/mentions_legales', 'mentions_legales');
Route::view('/test', 'test');


Route::view('/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Auth routes
require __DIR__.'/auth.php';


// -----------------------------
// Routes Scores
// -----------------------------

// Formulaire pour le concours actif
Route::get('/pages/insertion_score/form', [ScoreController::class, 'form'])
    ->name('scores.form')
    ->middleware(CheckRole::class . ':50,60,,90');

// Sauvegarde du score
Route::post('/pages/insertion_score/save', [ScoreController::class, 'save'])
    ->name('scores.save')
    ->middleware(CheckRole::class . ':50,60,90');

// Liste des scores
Route::get('/pages/modification_score/liste', [ScoreController::class, 'liste'])
    ->name('scores.liste')
    ->middleware(CheckRole::class . ':60,90');

// Supprimer un score
Route::delete('/scores/{id_equipe}/{id_epreuve}/delete', [ScoreController::class, 'delete'])
    ->name('scores.delete')
    ->middleware(CheckRole::class . ':60,90');

// Editer un score
Route::get('/scores/{id_equipe}/{id_epreuve}/edit', [ScoreController::class, 'edit'])
    ->name('scores.edit')
    ->middleware(CheckRole::class . ':60,90');

// Mettre à jour un score
Route::post('/scores/{id_equipe}/{id_epreuve}/update', [ScoreController::class, 'update'])
    ->name('scores.update')
    ->middleware(CheckRole::class . ':60,90');

// Recherche d'équipes (optionnelle)
Route::get('/insertion_score/search', [ScoreController::class, 'searchEquipe'])
    ->name('scores.searchEquipe')
    ->middleware(CheckRole::class . ':60,90');


use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Livewire\Volt\Volt;

// Accueil
Route::get('/', [PageController::class, 'home'])->name('home');

// Collèges
Route::get('/colleges/eleves', [PageController::class, 'eleves'])->name('colleges.eleves');
Route::get('/colleges/equipe', [PageController::class, 'equipe'])->name('colleges.equipe');

// Épreuves
Route::get('/epreuves', [PageController::class, 'epreuves'])->name('epreuves.index');

// Classement
Route::get('/classement', [PageController::class, 'classement'])->name('classement.index');

// Édition
Route::get('/edition/2024', [PageController::class, 'show2024'])->name('edition.2024');
Route::get('/edition/2025', [PageController::class, 'show2025'])->name('edition.2025');

// Saisie Note
Route::get('/saisie-note', [PageController::class, 'saisie-note'])->name('saisieNote.index') ->middleware(CheckRole::class . ':90, 50, 60');

// Page Gestion
Route::prefix('gestion')->group(function () {
    Route::get('/epreuves', [PageController::class, 'epreuves'])->name('gestion.epreuves');
    Route::get('/colleges', [PageController::class, 'colleges'])->name('gestion.colleges');
    Route::get('/abonnement', [PageController::class, 'abonnement'])->name('gestion.abonnement');
    Route::get('/role', [PageController::class, 'role'])->name('gestion.role');
    Route::get('/edition', [PageController::class, 'edition'])->name('gestion.edition');
    Route::get('/exportation', [PageController::class, 'exportation'])->name('gestion.exportation');
    Route::get('/modification', [PageController::class, 'modification'])->name('gestion.modification');
});

// Page Admin
Route::prefix('admin')->group(function () {
    Route::get('/genre', [PageController::class, 'genre'])->name('admin.genre');
    Route::get('/pays', [PageController::class, 'pays'])->name('admin.pays');
    Route::get('/utilisateurs', [PageController::class, 'utilisateurs'])->name('admin.utilisateurs');
});

// Connexion
Volt::route('login', 'pages.auth.login')->name('login');
Volt::route('register', 'pages.auth.register')->name('register');
Volt::route('logout', 'pages.auth.logout')->name('logout');


Route::resource('users', UserController::class);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/saisie-note', [ScoreController::class, 'form'])
    ->name('saisieNote.index')
    ->middleware(CheckRole::class . ':40,90');

Route::get('gestion/modification', [ScoreController::class, 'liste'])
    ->name('gestion.modification')
    ->middleware(CheckRole::class . ':60,90');

require __DIR__.'/auth.php';