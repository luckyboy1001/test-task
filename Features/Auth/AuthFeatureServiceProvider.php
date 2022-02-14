<?php

namespace Features\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class AuthFeatureServiceProvider extends ServiceProvider
{


    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        Route::prefix('api/auth/')
            ->middleware('api')
            ->group(__DIR__ . '/Routes/auth_routes.php');
    }

}
