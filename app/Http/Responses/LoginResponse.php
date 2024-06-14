<?php

namespace App\Http\Responses;

use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements ContractsLoginResponse {
    public function toResponse($request)
    {
        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended(Auth::user()->role->is_admin ? RouteServiceProvider::ADMIN_HOME : RouteServiceProvider::HOME);
    }
}