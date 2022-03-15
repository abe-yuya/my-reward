<?php

namespace App\Providers;

use App\Repositories\User\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepositoryContract;

class AppServiceProvider extends ServiceProvider
{

    public $singletons = [
        // Service層


        // Repository層
        UserRepositoryContract::class => EloquentUserRepository::class,
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
