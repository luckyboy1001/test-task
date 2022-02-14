<?php

namespace Features\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Features\Auth\Http\Requests\LoginUserRequest;
use Features\Auth\Responses\Response;
use Features\Auth\Services\ApiToken\IssueApiToken;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{

    public function login(LoginUserRequest $request)
    {
        if (!auth()->attempt($request->validated())) {
            return Response::loginFailed();
        }

        $token = IssueApiToken::issue(auth()->user());

        if (!$token) {
            return Response::loginFailed();
        }

        return Response::loginSucceed($token, auth()->user());
    }

}
