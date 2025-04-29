<?php

namespace Providers;

use Application\User\Interfaces\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Persistence\User\UserRepository;

class InfrastructureServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    public function boot()
    {
        //
    }
}
