<?php

namespace Features\Auth\Responses\JsonResponses;


class JsonResponses
{

    public function userCreated()
    {
        return response()->json([
            'message' => 'user created!'
        ], 201);
    }

    public function userCreationFailed()
    {
        return response()->json([
            'errors' => [
                'register_info' => 'an error happened in creating user'
            ]
        ], 400);
    }

    public function loginFailed()
    {
        return response()->json([
            'errors' => [
                'login_info' => 'email or password is not correct'
            ]
        ], 422);
    }


    public function loginSucceed($token, $user)
    {
        return response()->json([
            'token' => $token->plainTextToken,
            'user' => $user
        ], 200);
    }
}
