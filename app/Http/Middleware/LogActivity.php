<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (Auth::check()) {
            $user = Auth::user();
            $action = $request->route()->getName();
            $details = $request->fullUrl();

            $role = $user->getRoleNames()->first() ?? 'inconnu';

            Journal::create([
                'user_id' => $user->id,
                'user_type' => $role, 
                'action' => $action,
                'details' => $details,
            ]);
        }

        return $response;
    }
}
