<?php

namespace App\Providers;

use App\Repositories\Eloquent\ArticleRepository;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
    }
}
