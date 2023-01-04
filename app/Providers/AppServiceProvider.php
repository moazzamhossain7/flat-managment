<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

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
        Schema::defaultStringLength(191);

        Component::macro('notify', function ($message, $type = 'success') {
            $this->dispatchBrowserEvent('notify', ['title' => $message, 'type' => $type]);
        });

        Component::macro('closeModal', function ($modalName = 'modal') {
            $this->dispatchBrowserEvent('closeModal', $modalName);
        });

        Gate::define('super-admin', 'App\Policies\RolePolicy@isSuperAdmin');
        Gate::define('landlord', 'App\Policies\RolePolicy@isLandlord');
        Gate::define('tenant', 'App\Policies\RolePolicy@isTenant');
        Gate::define('hasRole', 'App\Policies\RolePolicy@hasAccess');

        Gate::define('visible', function ($user, $roles) {
            $roles = str_replace(':', ',', removeSpace($roles));

            if ($roles === '*') {
                return true;
            }

            return $user->hasRole(explode(',', $roles));
        });
    }
}
