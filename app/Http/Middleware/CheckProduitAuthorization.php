<?php

// app/Http/Middleware/CheckProduitAuthorization.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProduitAuthorization
{
    public function handle(Request $request, Closure $next)
    {
        // Exemple: Seuls les utilisateurs avec un certain rôle peuvent modifier
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Accès non autorisé.');
        }
        
        return $next($request);
    }
}