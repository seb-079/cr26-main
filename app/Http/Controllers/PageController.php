<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Classer;
use App\Models\User;

class PageController extends Controller
{
    public function home(): View
    {
        return view('accueil');
    }

    public function eleves(): View
    {
        return view('colleges.eleves');
    }
    public function equipe(): View
    {
        return view('colleges.equipe');
    }
    public function epreuves(): View
    {
        return view('epreuves');
    }

    public function classement(): View
    {
        UserController::MiseAJourClassement();
        
        $scores = Classer::getScoresByCategorie();

        return view('classement', compact('scores'));
    }
    public function show2024(): View
    {
        return view('edition.2024');
    }
    public function show2025(): View
    {
        return view('edition.2025');
    }

    public function saisie(): View
    {
        return view('saisie-note');
    }
    
    public function epreuvesGestion(): View
    {
        return view('gestion.epreuves');
    }
    public function colleges(): View
    {
        return view('gestion.colleges');
    }
    public function abonnement(): View
    {
        return view('gestion.abonnement');
    }
    public function role(): View
    {
        return view('gestion.role');
    }
    public function edition(): View
    {
        return view('pages.modif_score');
    }
    public function exportation(): View
    {
        return view('gestion.exportation');
    }
    public function modification(): View
    {
        return view('gestion.modification');
    }
    
    public function genre(): View
    {
        return view('admin.genre');
    }
    public function pays(): View
    {
        return view('admin.pays');
    }
    public function utilisateurs(): View
    {
        return view('admin.utilisateurs');
    }
}

    