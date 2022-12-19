<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json([
            'message' => 'user created successfully',
            'data' => $user,
            'token' => $user->createToken($user->email)->plainTextToken
        ], Response::HTTP_OK);
    }

    public function login(UserRequest $request)
    {
        if (!Auth::attempt($request->only(['phone', 'password']))) {
            return response()->json([
                'data' => '',
                'message' => 'credentials do not match'
            ], 401);
        }

        $user = User::where('phone', $request->phone)->first();

        return response()->json([
            'user' => $user,
            'token' => $user->createToken($user->email)->plainTextToken
        ], 200);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'You have succesfully been logged out'
        ]);
    }
}
