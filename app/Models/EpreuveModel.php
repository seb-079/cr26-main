<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EpreuveModel extends Model
{
    protected $table = 'epreuves';
    protected $fillable = ['nom', 'code', 'id_concours', 'score_max'];

    public static function getAll()
    {
        return DB::table('epreuves')->get();
    }

    public static function getByConcours($idConcours)
    {
        return DB::table('epreuves')->where('id_concours', $idConcours)->get();
    }

    public static function getById($id)
    {
        return DB::table('epreuves')->find($id);
    }

    public static function createEpreuve($data)
    {
        return DB::table('epreuves')->insert($data);
    }

    public static function updateEpreuve($id, $data)
    {
        return DB::table('epreuves')->where('id', $id)->update($data);
    }

    public static function deleteEpreuve($id)
    {
        return DB::table('epreuves')->where('id', $id)->delete();
    }
}
