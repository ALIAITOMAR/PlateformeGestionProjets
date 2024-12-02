<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !Cache::has('user-enligne' . Auth::user()->id)) {
            $expire_apres = Carbon::now()->addMinutes(5); 
            Cache::put('user-enligne' . Auth::user()->id, true, $expire_apres);
            User::where('id', Auth::user()->id)->update(['last_seen_at' => now()]);
        }
        return $next($request);
    }
}
