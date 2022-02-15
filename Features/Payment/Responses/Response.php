<?php

namespace Features\Payment\Responses;

use Features\Payment\Responses\JsonResponses\JsonResponses;
use Illuminate\Support\Facades\Facade;

class Response extends Facade
{
    protected static function getFacadeAccessor()
    {
        return JsonResponses::class;
    }

}
