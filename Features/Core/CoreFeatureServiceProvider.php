<?php

namespace Features\Core;

use Features\Auth\Models\User;
use Features\Payment\Models\Transaction;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class CoreFeatureServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
    }
}
