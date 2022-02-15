<?php


use Features\Payment\Http\Controllers\MoveMoneyController;
use Features\Payment\Http\Controllers\Transaction\GetUserTransactionsController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => ['auth:sanctum']
], function () {

    Route::post('move-money', [MoveMoneyController::class, 'move'])
        ->name('payment.moveMoney');

    Route::get('user/transactions', [GetUserTransactionsController::class, 'index'])
        ->name('payment.user.transactions.index');

});





