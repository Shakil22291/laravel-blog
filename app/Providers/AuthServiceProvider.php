<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Policies\CommentsPolicy;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // Post::class => PostPolicy::class
        Comment::class => CommentsPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function(User $user, $ability) {
            if ($user->isAdmin()) {
                return true;
            }
            if($user->abilities()->contains($ability)) {
                return true;
            }
        });
    }
}
