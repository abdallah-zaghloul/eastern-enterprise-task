<?php

namespace Modules\Persona\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified as BaseEnsureEmailIsVerified;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

/**
 *
 */
class EnsureEmailIsVerified extends BaseEnsureEmailIsVerified
{
    protected Collection $envRoutesKeyedByGuards;
    protected Collection $dottedEnvRoutesKeyedByGuards;
    protected Collection $guards;

    protected ?string $guard = null;

    public function __construct()
    {
        $this->envRoutesKeyedByGuards = $this->getEnvRoutesKeyedByGuards();
        $this->guards = $this->envRoutesKeyedByGuards->keys();
        $this->dottedEnvRoutesKeyedByGuards = $this->envRoutesKeyedByGuards->dot();
        $this->guard = $this->guards->firstWhere(fn($guard) => auth($guard)->check());
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param null $redirectToRoute
     * @return Response|RedirectResponse|null
     */
    public function handle($request, Closure $next, $redirectToRoute = null): Response|RedirectResponse|null
    {
        return match ($this->shouldVerifyEmail($request)){
            true => $this->redirectAccTo($request, $redirectToRoute),
            default => $next($request)
        };
    }


    /**
     * @param $request
     * @param $redirectToRoute
     * @return RedirectResponse
     */
    protected function redirectAccTo($request, $redirectToRoute = null): RedirectResponse
    {
        return $request->expectsJson()
            ? abort(403, 'Your email address is not verified.')
            : Redirect::guest(URL::route($redirectToRoute ?? $this->dottedEnvRoutesKeyedByGuards->get("$this->guard.route")));
    }


    /**
     * @param $request
     * @return bool
     */
    protected function shouldVerifyEmail($request): bool
    {
        return ! ($user = $request->user($this->guard)) or collect([
                $this->dottedEnvRoutesKeyedByGuards->get("$this->guard.env"),
                $user instanceof MustVerifyEmail,
                ! $user->hasVerifiedEmail()
        ])->every(fn($condition) => $condition === true);
    }

    protected function getEnvRoutesKeyedByGuards(): Collection
    {
        return collect([
            'web'=> ['env' => env('SHOULD_VERIFY_USER_EMAIL', false), 'route' => 'verification.notice'],
            'adminWeb'=> ['env' => env('SHOULD_VERIFY_ADMIN_EMAIL', false), 'route' => 'adminWeb.verification.notice'],
        ]);
    }
}
