<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        // Repositories
        \App\Contracts\Repositories\UserRepository::class => \App\Repositories\UserRepository::class,
        \App\Modules\Auth\Repositories\AuthRepository::class => \App\Repositories\AuthRepository::class,
        \App\Contracts\Repositories\BookRepository::class => \App\Repositories\BookRepository::class,

        // Datasources
        \App\Contracts\Datasources\UserDatasource::class => \App\Datasources\Eloquent\UserEloquentDatasource::class,
        \App\Contracts\Datasources\BookDatasource::class => \App\Datasources\Eloquent\BookDatasource::class,

    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
