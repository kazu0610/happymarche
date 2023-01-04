<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;
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

        // 管理者
        Gate::define('admin', function($user) {
              return ($user->role == 100);
        });

        // 販売者
        Gate::define('shop', function($user) {
              return ($user->role >= 50);
        });

        // 一般ユーザー
        Gate::define('general', function ($user) {
              return ($user->role == 1);
        });
    }
}
