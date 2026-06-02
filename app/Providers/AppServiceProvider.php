<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domains\Identity\Application\Security\PasswordHasher;
use App\Domains\Identity\Infrastructure\Security\BcryptPasswordHasher;
use App\Domains\Identity\Application\Security\CurrentUser;
use App\Domains\Identity\Infrastructure\Security\LaravelCurrentUser;
use App\Domains\Identity\Application\Security\CurrentTenant;
use App\Domains\Identity\Infrastructure\Security\LaravelCurrentTenant;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            PasswordHasher::class,
            BcryptPasswordHasher::class
        );

        $this->app->bind(
            CurrentUser::class,
            LaravelCurrentUser::class
        );

        $this->app->bind(
            CurrentTenant::class,
            LaravelCurrentTenant::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}


