<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class NEAdminGuardMiddleware
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

        if ($user = Auth::user()) {
            $request->attributes->add(['user' => $user]);
            return $next($request);
        }

        flash('É necessário fazer login')->error();
        return redirect(route('admin.login.form'));
    }
}
