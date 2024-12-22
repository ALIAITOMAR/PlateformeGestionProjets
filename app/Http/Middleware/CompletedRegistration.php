<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompletedRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifiez si l'enseignant a terminé son inscription
        if (! $request->user()->hasCompletedRegistration()) {
            return redirect()->route('complete.enseignant.profile');
        }

        return $next($request);
    }
}
