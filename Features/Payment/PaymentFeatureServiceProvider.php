<?php

namespace Features\Payment;

use Features\Auth\Models\User;
use Features\Payment\Models\Transaction;
use Features\Payment\Repos\Eloquent\TransactionRepo;
use Features\Payment\Repos\Interfaces\TransactionRepoInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class PaymentFeatureServiceProvider extends ServiceProvider
{


    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'payment');
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        Route::prefix('api/payment/')
            ->middleware('api')
            ->group(__DIR__ . '/Routes/payment_routes.php');


        User::resolveRelationUsing('transactions', function ($user) {
            return $user->belongsTo(Transaction::class, 'user_id');
        });


        $this->app->bind(TransactionRepoInterface::class, TransactionRepo::class);

    }

}
