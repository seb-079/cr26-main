<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ScoreModel extends Model
{


    
     // Récupère la liste des concours
     
    public static function getConcours()
    {
        return DB::table('concours')->get();
    }

    //recupere les equipes de concours
    public static function getEquipesConcours($idConcours)
    {
        return DB::table('equipes')
                ->where('id_concours', $idConcours)
                ->get();
    }

    
    //recupere les epreuves de concours
    
    public static function getEpreuvesConcours($idConcours)
    {
        return DB::table('epreuves')->where('id_concours', $idConcours)->get();
    }

        public static function getConcoursActif()
    {
        return DB::table('concours')->where('actif', 1)->first();
    }

    
    //verifie si un score existe déjà pour une équipe et une épreuve
     
    public static function scoreExiste($idEquipe, $idEpreuve)
    {
        return DB::table('scorer')->where('id_equipe', $idEquipe)->where('id_epreuve', $idEpreuve)->exists();
    }

    //verifie si le score est pas vide et que son core rentre dans la range prevu
    public static function scoreValide($idEpreuve, $score)
    {
        $resultat = true;
        $epreuve = DB::table('epreuves')->find($idEpreuve);
        $score_max = $epreuve->score_max;

        if ( !(is_numeric($score)) ) {
            $resultat = false;
        }
        if ($epreuve == null) {
            $resultat = false;
        }
        elseif (($score_max < $score) || ($score < 0)) {
            $resultat = false;
        }
        return $resultat;

        

    }

    
    //Inserer les donner du formulaire score
    
    public static function insertScore($score)
    {
        return DB::table('scorer')->insert($score);
    }

    public static function getScorer()
    {
    return DB::table('scorer')->get();
    }

    public static function getAllScoresDetails()
    {
    return DB::table('scorer')
        ->join('equipes', 'scorer.id_equipe', '=', 'equipes.id')
        ->join('epreuves', 'scorer.id_epreuve', '=', 'epreuves.id')
        ->select(
            'equipes.nom as equipe_nom',
            'epreuves.nom as epreuve_nom',
            'equipes.code as equipe_code',
            'epreuves.code as epreuve_code',
            'scorer.score',
            'scorer.commentaire'
        )
        ->get();
    }
}
