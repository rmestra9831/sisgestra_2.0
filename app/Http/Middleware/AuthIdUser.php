<?php

namespace App\Http\Middleware;

use App\Models\Hallazgo;
use Closure;

class AuthIdUser
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
        $finding = Hallazgo::where('memorandum',$request->route()->parameter('finding'))->firstOrFail();
        if (auth()->user()->can('edit register') || $finding->leaderAudit->id == auth()->user()->id) {
            return $next($request);
        }
        return abort(403);
    }
}
