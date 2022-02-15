<?php

namespace Features\Payment\Services\HttpServices;

use Illuminate\Support\Facades\Facade;

class MoveMoneyService extends Facade
{

    protected static function getFacadeAccessor()
    {
        if (config('app.debug') === false || config('app.env') === 'production') {
            return MoveMoney::class;
        }

        return FakeMoveMoney::class;
    }

}
