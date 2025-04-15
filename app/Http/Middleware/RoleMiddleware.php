<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // untuk auth()
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        
        if (!Auth::check()) {
            return redirect('/login');
        }


        $userRole = Auth::user()->role->role_name ?? null;

        dd($userRole);  

        
        \Log::info('Role user:', ['role' => $userRole]);
        \Log::info('Diperlukan role:', ['roles' => $roles]);

        
        if (!in_array($userRole, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request); 
    }
}
