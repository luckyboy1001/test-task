<?php

namespace Features\Payment\Services\HttpServices;

use Illuminate\Support\Facades\Facade;

class MoveMoneyService extends Facade
{

    protected static function getFacadeAccessor()
    {
        return FakeMoveMoney::class;
    }

}
