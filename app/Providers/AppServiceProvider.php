<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        //Configura o estilo da paginação para o Bootstrap
        Paginator::useBootstrapFive();

        Gate::before(function ($user) {
            if ($user->hasRole('Super Admin')) {
                return true; // Super Admin tem acesso a tudo
            }
        });
    }
}
