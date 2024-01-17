<?php

namespace Modules\Finance\Providers;
use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Modules\Finance\Components\Companies;

class LivewireServiceProvider extends ServiceProvider
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
        Livewire::component('finance::companies', Companies::class);
    }
}
