<?php

namespace Features\Auth\Repos;

use Features\Auth\Models\User;
use Exception;

class UserRepo
{

    public static function create(array $data)
    {
        try {
            isset($data['password']) && $data['password'] = bcrypt($data['password']);

            $user = User::create($data);
        } catch (Exception $exception) {
            return null;
        }

        if (!$user->exists) {
            return null;
        }

        return $user;
    }

}
