<?php

namespace Aries\LaravelRbac;

use Aries\LaravelRbac\Models\Ability;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Aries\LaravelRbac\Models\User;

class LaravelRbacAuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        if(Schema::hasTable('abilities')) {
            foreach (Ability::all() as $ability) {
                Gate::define($ability->name, function (User $user) use ($ability) {
                    return $user->hasAbility($ability->name);
                });
            }
        }
    }
}