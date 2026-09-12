<?php

namespace App\Providers;

use App\Enums\UserRole;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('super-admin', fn ($user) => $user->role === UserRole::SuperAdmin);
        Gate::define('dkm', fn ($user) => $user->role === UserRole::Dkm);

        Carbon::setLocale(config('app.locale'));
    }
}
