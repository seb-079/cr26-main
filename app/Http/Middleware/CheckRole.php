<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckRole
{
public function handle($request, Closure $next, $roleIds)
{
    $userId = $request->user()->id;

    $userRole = DB::table('engager')
        ->where('Id_utilisateur', $userId)
        ->value('Id_role');

    $allowedRoles = explode(',', $roleIds);

    if (!in_array($userRole, $allowedRoles)) {
        abort(403, "Accès refusé");
    }

    return $next($request);
}
}
