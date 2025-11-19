<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ConcoursModel extends Model
{
    protected $table = 'concours';
    protected $fillable = ['nom', 'actif'];

    // Récupère tous les concours
    public static function getAll()
    {
        return DB::table('concours')->get();
    }

    // Récupère le concours actif
    public static function getActif()
    {
        return DB::table('concours')->where('actif', 1)->first();
    }

        public static function getEnCours()
    {
        return DB::table('concours')->where('en_cours', 1)->first();
    }
    // Récupère un concours par ID
    public static function getById($id)
    {
        return DB::table('concours')->find($id);
    }

    // Créer un concours
    public static function createConcours($data)
    {
        return DB::table('concours')->insert($data);
    }

    // Mettre à jour un concours
    public static function updateConcours($id, $data)
    {
        return DB::table('concours')->where('id', $id)->update($data);
    }

    // Supprimer un concours
    public static function deleteConcours($id)
    {
        return DB::table('concours')->where('id', $id)->delete();
    }
}
