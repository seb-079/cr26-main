<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ScoreModel extends Model
{
    protected $table = 'scorer';
    protected $fillable = [
        'id_secretaire',
        'id_equipe',
        'id_epreuve',
        'score',
        'commentaire',
        'created_at',
        'updated_at'
    ];

    /**
     * Vérifie si un score existe déjà pour une équipe et une épreuve
     */
    public static function scoreExiste($idEquipe, $idEpreuve)
    {
        return DB::table('scorer')
            ->where('id_equipe', $idEquipe)
            ->where('id_epreuve', $idEpreuve)
            ->exists();
    }

    /**
     * Vérifie la validité d'un score
     */
    public static function scoreValide($idEpreuve, $score)
    {
        $epreuve = DB::table('epreuves')->find($idEpreuve);

        if (!$epreuve || !is_numeric($score)) {
            return false;
        }

        return $score >= 0 && $score <= $epreuve->score_max;
    }

    /**
     * Insère un nouveau score
     */
    public static function insertScore($data)
    {
        return DB::table('scorer')->insert($data);
    }

    /**
     * Récupère tous les scores détaillés (avec noms et codes)
     */
public static function getAllScoresDetails($recherche = null, $idSecretaire = null)
{
    $query = DB::table('scorer as s')
        ->join('equipes as e', 's.id_equipe', '=', 'e.id')
        ->join('epreuves as ep', 's.id_epreuve', '=', 'ep.id')
        ->select(
            's.id_equipe',
            's.id_epreuve',
            's.id_secretaire',
            'e.nom as equipe_nom',
            'ep.nom as epreuve_nom',
            'e.code as equipe_code',
            'ep.code as epreuve_code',
            's.score',
            's.commentaire',
            's.verifier'
        );

    // Filtre equipe
    if (!empty($recherche)) {
        $query->where(function($q) use ($recherche) {
            $q->where('e.nom', 'like', "%{$recherche}%")
              ->orWhere('ep.nom', 'like', "%{$recherche}%")
              ->orWhere('e.code', 'like', "%{$recherche}%")
              ->orWhere('ep.code', 'like', "%{$recherche}%");
        });
    }

    // Filtre secrétaire
    if (!empty($idSecretaire)) {
        $query->where('s.id_secretaire', $idSecretaire);
    }

    return $query->get();
}
       

    /**
     * Récupère un score précis (équipe + épreuve)
     */
    public static function getScore($idEquipe, $idEpreuve)
    {
        return DB::table('scorer')
            ->where('id_equipe', $idEquipe)
            ->where('id_epreuve', $idEpreuve)
            ->first();
    }

    /**
     * Mettre à jour un score existant
     */
    public static function updateScore($idEquipe, $idEpreuve, $data)
    {
        return DB::table('scorer')
            ->where('id_equipe', $idEquipe)
            ->where('id_epreuve', $idEpreuve)
            ->update($data);
    }

    /**
     * Supprimer un score
     */
    public static function deleteScore($idEquipe, $idEpreuve)
    {
        return DB::table('scorer')
            ->where('id_equipe', $idEquipe)
            ->where('id_epreuve', $idEpreuve)
            ->delete();
    }

    public static function isFalse()
    {
    return DB::table('scorer')
        ->where('verifier', false) 
        ->get();
    }

public static function atTrue($idEquipe, $idEpreuve)
    {
    return DB::table('scorer')
        ->where('id_equipe', $idEquipe)
        ->where('id_epreuve', $idEpreuve)
        ->update(['verifier' => true, 'updated_at' => now()]);
    }
}


