<?php

namespace Features\Auth\Services\ApiToken;


class IssueApiToken
{

    public static function issue($user)
    {
        $user->currentAccessToken() && $user->currentAccessToken()->delete();

        return $user->createToken('auth-token');
    }

}
