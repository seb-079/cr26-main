<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScoreModel;
use App\Models\EquipeModel;
use App\Models\EpreuveModel;
use App\Models\ConcoursModel;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    /**
     * Formulaire pour le concours en cours
     */
    public function form()
    {

    $concours = ConcoursModel::getEnCours();
    if (!$concours) {
        return back()->withErrors(['concours' => 'Aucun concours en cours trouvé.']);
    }

    $idConcours = $concours->id;
    $equipes = EquipeModel::getByConcours($idConcours);
    $epreuves = EpreuveModel::getByConcours($idConcours);

        return view('pages.insertion_score.insertion_score', compact(
            'equipes',
            'epreuves',
            'concours'
        ));
    }

    /**
     * Sauvegarde d'un score
     */
    public function save(Request $request)
    {
        $request->validate([
            'id_equipe' => 'required|integer|exists:equipes,id',
            'id_epreuve' => 'required|integer|exists:epreuves,id',
            'score' => 'required|numeric|min:0',
            'commentaire' => 'nullable|string|max:255',
        ]);

        if (!ScoreModel::scoreValide($request->id_epreuve, $request->score)) {
            return back()->withErrors(['score' => 'Le score dépasse le maximum autorisé.']);
        }

        if (ScoreModel::scoreExiste($request->id_equipe, $request->id_epreuve)) {
            return back()->withErrors(['score' => 'Un score existe déjà pour cette équipe et cette épreuve.']);
        }

        ScoreModel::insertScore([
            'id_secretaire' => Auth::id(),
            'id_equipe' => $request->id_equipe,
            'id_epreuve' => $request->id_epreuve,
            'score' => $request->score,
            'commentaire' => $request->commentaire,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Score enregistré avec succès !');
    }

    /**
     * Liste tous les scores
     */
public function liste(Request $request)
{
    $q = $request->input('q', null); 
    $scores = ScoreModel::getAllScoresDetails($q); 
    return view('pages.modification_score.modif_score', compact('scores'));
}

    /**
     * Supprimer un score
     */
    public function delete($id_equipe, $id_epreuve)
    {
        ScoreModel::deleteScore($id_equipe, $id_epreuve);
        return back()->with('success', 'Score supprimé avec succès !');
    }

    /**
     * Editer un score
     */
public function edit($id_equipe, $id_epreuve)
{
    $score = ScoreModel::getScore($id_equipe, $id_epreuve);
    if (!$score) {
        return back()->withErrors(['message' => 'Score introuvable.']);
    }

    $concours = ConcoursModel::getEnCours();
    if (!$concours) {
        return back()->withErrors(['concours' => 'Aucun concours actif trouvé.']);
    }

    $idConcours = $concours->id;
    $equipes = EquipeModel::getByConcours($idConcours);
    $epreuves = EpreuveModel::getByConcours($idConcours);

    return view('pages.modification_score.edit_score', compact('score', 'equipes', 'epreuves'));
}


    /**
     * Mettre à jour un score
     */
    public function update(Request $request, $id_equipe, $id_epreuve)
    {
        $validated = $request->validate([
            'id_equipe' => 'required|integer|exists:equipes,id',
            'id_epreuve' => 'required|integer|exists:epreuves,id',
            'score' => 'required|numeric|min:0',
            'commentaire' => 'nullable|string|max:255',
        ]);

        if (!ScoreModel::scoreValide($validated['id_epreuve'], $validated['score'])) {
            return back()->withErrors(['score' => 'Score invalide.']);
        }

        ScoreModel::updateScore($id_equipe, $id_epreuve, [
            'id_equipe' => $validated['id_equipe'],
            'id_epreuve' => $validated['id_epreuve'],
            'score' => $validated['score'],
            'commentaire' => $validated['commentaire'] ?? null,
            'updated_at' => now(),
        ]);

        return redirect()->route('scores.liste')->with('success', 'Score modifié avec succès !');
    }

    /**
     * Recherche d'équipes pour insertion dynamique (optionnel)
     */
    public function searchEquipe(Request $request)
    {
        $query = $request->input('q', '');
        $equipes = EquipeModel::getAll()
            ->filter(fn($e) => str_contains(strtolower($e->nom), strtolower($query)) || str_contains(strtolower($e->code), strtolower($query)));

        return response()->json($equipes);
    }
}
