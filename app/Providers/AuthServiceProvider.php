<?php

namespace App\Providers;

 use App\Models\User;
 use Illuminate\Support\Facades\Gate;
use App\Emums\UserRoles;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        $this->userGateRole('isAdmin',UserRoles::ADMIN);
        $this->userGateRole('isUser',UserRoles::USER);
        //
    }
    private function userGateRole( $name, $role){
        Gate::define($name,function (User $user) use ($role) {
            return $user->role == $role;
        });
    }
}
