<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AttachUserIdToSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (auth()->check()) {
            // Mettre à jour la session avec l'ID de l'utilisateur connecté
            DB::table('sessions')
                ->where('id', session()->getId())
                ->update(['user_id' => auth()->id()]);
        }

        return $response;
    }
    
}
