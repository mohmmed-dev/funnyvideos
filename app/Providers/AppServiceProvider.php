<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Video;
use App\View\Composers\HashtagsComposer;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
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
        View::composer(['tools.hashtags','tools.list-hashtags'], HashtagsComposer::class);

        Gate::define('update_user', function(User $user) {
            return $user->isAdmin();
        });
        Gate::define('delete_user', function(User $user) {
            return $user->isSuperAdmin();
        });

        Gate::define('update_video', function(User $user, Video $video) {
            return  ($user->isAdmin() || $user->id === $video->user_id)  && !$user->isBlock() ;
        });

        Gate::define('update_comment', function(User $user, Comment $comment) {
            return  ($user->isAdmin() ||  $user->id === $comment->user_id)  && !$user->isBlock() ;
        });
    }
}
