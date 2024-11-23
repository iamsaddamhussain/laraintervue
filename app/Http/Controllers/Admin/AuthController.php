<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(LoginRequest $request): mixed
    {
        $user = User::whereEmail($request->email)
            ->first();
        info($user);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['Credentials not matched!'], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('api')->accessToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response);
    }

    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    public function logout(Request $request): void
    {
        $request->user()->token()->revoke();
    }
}
