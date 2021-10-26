<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Post' => 'App\Policies\PostPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user) {
            return $user::haveRoles('admin', $user);
        });

        Gate::define('isAuthor', function($user) {
            return $user::haveRoles('author', $user);
        });

        Gate::define('isUser', function($user) {
            return $user::haveRoles('user', $user);
        });

        Gate::define('isMyPost', function ($user ,$post){
            return $user->id == $post->user_id;
        });

    }
}
