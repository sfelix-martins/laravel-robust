<?php

namespace App\Providers;

use Carbon\Carbon;
use Laravel\Passport\Passport;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Gate;
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

        Passport::routes();

        // Passport::tokensExpireIn(Carbon::now()->addMinutes(1));

        // Passport::refreshTokensExpireIn(Carbon::now()->addMinutes(2));

        Gate::define('users.view', function (User $user, $id) {
            return $user->id == $id;
        });
    }
}
