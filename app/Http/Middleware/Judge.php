<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Judge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->is_judge ==1) {
            return $next($request);
        } else {
            return response()->json([
                'errors' => "Vous n'avez pas le droit d'aller là !!",
            ], 422);
        }

    }
}
