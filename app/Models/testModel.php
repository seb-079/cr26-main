public static function getRoleID($idUser)
{
    return DB::table('engager')
        ->where('Id_utilisateur', $idUser)
        ->value('Id_role');
}