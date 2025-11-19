<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EquipeModel extends Model
{
    protected $table = 'equipes';
    protected $fillable = ['nom', 'code', 'id_concours'];

    public static function getAll()
    {
        return DB::table('equipes')->get();
    }

    public static function getByConcours($idConcours)
    {
        return DB::table('equipes')->where('id_concours', $idConcours)->get();
    }

    public static function getById($id)
    {
        return DB::table('equipes')->find($id);
    }

    public static function createEquipe($data)
    {
        return DB::table('equipes')->insert($data);
    }

    public static function updateEquipe($id, $data)
    {
        return DB::table('equipes')->where('id', $id)->update($data);
    }

    public static function deleteEquipe($id)
    {
        return DB::table('equipes')->where('id', $id)->delete();
    }
}
