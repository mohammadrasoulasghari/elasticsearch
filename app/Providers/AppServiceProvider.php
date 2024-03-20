<?php

namespace App\Providers;

use Database\Factories\UserFactory;
use Illuminate\Support\ServiceProvider;
use Matchish\ScoutElasticSearch\Searchable\ImportSourceFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ImportSourceFactory::class, UserFactory::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
