<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // ← Debe estar aquí
        Gate::policy(\App\Models\User::class, \App\Policies\UserPolicy::class);
        Gate::policy(\App\Models\Budget::class, \App\Policies\BudgetPolicy::class);
        Gate::policy(\App\Models\Externalmedia::class, \App\Policies\ExternalmediaPolicy::class);
        Gate::policy(\App\Models\Role::class, \App\Policies\RolePolicy::class);
    }
}
