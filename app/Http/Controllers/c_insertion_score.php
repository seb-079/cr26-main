<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_insertion_score;
use Illuminate\Support\Facades\Auth;

class c_insertion_score extends Controller
{
    //Sélection du concours
    public function selectConcours()
    {
        $concours = m_insertion_score::getConcours();
        return view('pages/insertion_score/selection_concours', ['concours'=>$concours]);
    }

public function form()
{
    $idConcours = session('id_concours');

    if (!$idConcours) {
        return redirect()->route('insertion_score.select');
    }

    $equipes = m_insertion_score::getEquipesConcours($idConcours);
    $epreuves = m_insertion_score::getEpreuvesConcours($idConcours);

    return view('pages.insertion_score.insertion_score', ['equipes' => $equipes, 'epreuves' => $epreuves]);
}

public function concoursChoisi(Request $request)
{

    session(['id_concours' => $request->id_concours]);

    return redirect()->route('insertion_score.form');
}

    //Sauvegarde du score
    public function save(Request $request)
    {
        $resultat = back()->with('success', 'Score enregistré avec succès !');

        if ((m_insertion_score::scoreValide($request->id_epreuve, $request->score)) == false) {
            $resultat = back()->withErrors(['score' => 'Le score dépasse le maximum autorisé.']);
        }

        if ((m_insertion_score::scoreExiste($request->id_equipe, $request->id_epreuve)) == true) {
            $resultat = back()->withErrors(['score' => 'Un score existe déjà pour cette équipe et cette épreuve.']);
        }

        m_insertion_score::insertScore([
            //'id_secretaire' => Auth::id(),
            'id_secretaire' => 1096,
            'id_equipe' => $request->id_equipe,
            'id_epreuve' => $request->id_epreuve,
            'score' => $request->score,
            'commentaire' => $request->commentaire,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return $resultat;
    }
}
