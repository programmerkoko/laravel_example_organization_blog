<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;

use App\Models\User;
use App\Policies\CommentPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
Schema::defaultStringLength(191);

Gate::define('post-update', function(User $user, Post $post) {

    return $user->id==$post->user_id;

});




    }
}