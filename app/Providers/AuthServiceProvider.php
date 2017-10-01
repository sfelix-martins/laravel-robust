<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Route::group(['prefix' => 'v1', 'middleware' => 'api'], function () {
            Passport::routes();
        });

        Gate::define('users.view', function (User $user, $id) {
            return $user->id == $id;
        });
    }
}
