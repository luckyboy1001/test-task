<?php

namespace Features\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Features\Auth\Http\Requests\RegisterUserRequest;
use Features\Auth\Repos\UserRepo;
use Features\Auth\Responses\Response;

class RegisterController extends Controller
{

    public function register(RegisterUserRequest $request)
    {
        $user = UserRepo::create($request->validated());


        if (is_null($user)) {
            return Response::userCreationFailed();
        }

        return Response::userCreated();
    }

}
