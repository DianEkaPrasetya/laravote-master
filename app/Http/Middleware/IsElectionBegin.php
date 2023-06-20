<?php

namespace App\Http\Middleware;

use App\Schedule;
use Closure;

class IsElectionBegin
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
        
        if(Schedule::all()->count() <= 0)
            return abort(403);
            // 21 22
        if(now() < Schedule::all()->first()->election_start_date  ||  now() > Schedule::all()->first()->election_end_date)

        return $next($request);
    }
}
