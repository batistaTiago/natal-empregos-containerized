<?php

namespace App\Http\Middleware;

use Closure;

class NEVerificarPermissaoMiddleware
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

        $user = $request->attributes->get('user');

        if ($user->is_admin) {
            return $next($request);
        } else {
            dd('acesso negado');
        }

    }
}
