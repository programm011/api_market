<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class AuthService
{

    public function register(FormRequest $request)
    {
        $user = User::create($request->validated());
        return $user;
    }
}
