<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function __construct(protected AuthService $service) { }


    public function register(RegisterRequest $request)
    {
        $user = $this->service->register($request);
        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->sendResponse(compact('token','user'), 'success');
    }

    public function login(LoginRequest $request)
    {
        $auth = Auth::attempt($request->only('email','password'));
        if (!$auth) {
            return $this->sendError('Unauthorized', 401);
        }

        $token = \auth()->user()->createToken('auth_token')->plainTextToken;
        return $this->sendResponse(compact('token'), 'success');
    }
}
