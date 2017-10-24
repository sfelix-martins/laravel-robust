<?php

namespace Modules\Admin\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Admin;
use Illuminate\Auth\Access\AuthorizationException;

class CheckIfIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $model = Auth::guard('api')->user();

        if ($model instanceof Admin) {
            return $next($request);
        } else {
            throw new AuthorizationException("You aren't admin.", 121);
        }
    }
}
