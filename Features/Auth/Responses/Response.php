<?php

namespace Features\Auth\Responses;

use Features\Auth\Responses\JsonResponses\JsonResponses;
use Illuminate\Support\Facades\Facade;

class Response extends Facade
{

    public static function getFacadeAccessor()
    {
        return JsonResponses::class;
    }

}
