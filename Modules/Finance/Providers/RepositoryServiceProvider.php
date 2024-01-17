<?php

namespace Modules\Finance\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(\Modules\Finance\Repositories\CompanyRepository::class, \Modules\Finance\Repositories\CompanyRepositoryEloquent::class);
        //:end-bindings:
    }
}
