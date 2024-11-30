<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as BaseAuthServiceProvider;

use App\Models\Comment;
use App\Models\Post;
use App\Policies\CommentPolicy;
use App\Policies\PostPolicy;

class AuthServiceProvider extends BaseAuthServiceProvider
{
    /**
     * Register services.
     */

protected $policies = [


    Comment::class=>CommentPolicy::class,
    Post::class=>PostPolicy::class

];


    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
$this->registerPolicies();



    }
}