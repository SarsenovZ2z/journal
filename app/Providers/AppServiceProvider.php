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
        \App\Contracts\Datasources\UserDatasource::class => \App\Datasources\Eloquent\UserEloquentDatasource::class,

        \App\Contracts\Repositories\UserRepository::class => \App\Repositories\UserRepository::class,
        \App\Contracts\Repositories\AuthRepository::class => \App\Repositories\AuthRepository::class,

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
