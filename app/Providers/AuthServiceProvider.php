<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('manage-app', function ($user) {
            return $user->hasAnyRole(['superviseur', 'administrateur']);
        });

        Gate::define('edit-users', function ($user) {
            return $user->hasAnyRole(['superviseur', 'administrateur']);
        });

        Gate::define('ecrire', function ($user) {
            return $user->hasAnyRole(['administrateur','Chef de Pavillon']);
        });

        Gate::define('mis-a-jours', function ($user) {
            return $user->hasAnyRole(['Editeur','administrateur']);
        });

        Gate::define('facture', function ($user) {
            return $user->hasAnyRole(['Facturier','administrateur']);
        });

        Gate::define('delete-users', function ($user) {
            return $user->hasAnyRole(['administrateur']);
        });

       
        
    }
}
