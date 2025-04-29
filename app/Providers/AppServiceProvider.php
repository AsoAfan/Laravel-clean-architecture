<?php

declare(strict_types=1);

namespace Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $this->loadMigrationsFrom(
            infrastructure_path('Persistence/Migrations'),
        );
    }
}
