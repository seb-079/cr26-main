<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScoreModel;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    
public function ConcoursActif()
{
    $concours = ScoreModel::getConcoursActif();

    if (!$concours) {
        return back()->withErrors(['concours' => 'Aucun concours actif trouvé.']);
    }

    $equipes = ScoreModel::getEquipesConcours($concours->id);
    $epreuves = ScoreModel::getEpreuvesConcours($concours->id);

    return view('pages.insertion_score.insertion_score', [
        'equipes' => $equipes,
        'epreuves' => $epreuves,
        'concours' => $concours
    ]);
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

        if ((ScoreModel::scoreValide($request->id_epreuve, $request->score)) == false) {
            $resultat = back()->withErrors(['score' => 'Le score dépasse le maximum autorisé.']);
        }

        if ((ScoreModel::scoreExiste($request->id_equipe, $request->id_epreuve)) == true) {
            $resultat = back()->withErrors(['score' => 'Un score existe déjà pour cette équipe et cette épreuve.']);
        }

        ScoreModel::insertScore([
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

    public function listeScores()
    {
    $scores = ScoreModel::getAllScoresDetails(); 

    return view('pages.modification_score.modif_score', ['scores' => $scores]);
    }
}
