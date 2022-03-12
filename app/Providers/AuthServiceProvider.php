<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-list-user', function ($user) {
            if ($user->role == 1 or $user->role == 2) 
                return true; 
            return false; 
        });

        Gate::define('edit-another-profile', function ($user) {
            if ($user->role == 1) 
                return true; 
            return false; 
        });

        Gate::define('view-list-post', function ($user) {
            if ($user->role == 1 or $user->role == 2) 
                return true; 
            return false; 
        });

        Gate::define('create-post', function ($user) {
            if ($user->role == 3) 
                return true; 
            return false; 
        });

        Gate::define('edit-another-post', function ($user) {
            if ($user->role == 1 or $user->role == 2) 
                return true; 
            return false; 
        });
    }
}