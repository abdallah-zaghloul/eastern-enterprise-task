<?php

namespace Modules\Persona\Http\Middleware;

use Modules\Persona\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class RedirectIfAuthenticated
{
    public array $urls = [
        'web' => RouteServiceProvider::USER_HOME,
        'adminWeb' => RouteServiceProvider::ADMIN_HOME,
    ];


    /**
     * Handle an incoming request.
     *
     * @param \Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        foreach ($guards as $guard) {
            if (auth($guard)->check())
                return redirect($this->urls[$guard]);
        }

        return $next($request);
    }
}
