<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_insertion_score extends Model
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
}
