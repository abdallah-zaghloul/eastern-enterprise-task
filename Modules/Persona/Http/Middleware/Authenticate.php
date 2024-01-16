<?php

namespace Modules\Persona\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Modules\Persona\Providers\RouteServiceProvider;

/**
 *
 */
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : match ($request->path()){
            RouteServiceProvider::ADMIN_HOME => route('adminWeb.login'),
            RouteServiceProvider::USER_HOME => route('login'),
            default => route('login')
        };
    }
}
