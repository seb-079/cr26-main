<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    protected $table = 'users';


    public static function getAllSecretaires()
    {
        return DB::table('users as u')
            ->join('engager as e', 'u.id', '=', 'e.id_utilisateur')
            ->where('e.id_role', 50)
            ->select('u.id', 'u.name')
            ->distinct()
            ->get();
    }
}
