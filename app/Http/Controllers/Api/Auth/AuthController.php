<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

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
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('phone', $request->phone)->first();

        return response()->json([
            'user' => $user,
            'token' => $user->createToken($user->email)->plainTextToken
        ], Response::HTTP_OK);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'You have succesfully been logged out'
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'The email is wrong'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $status = Password::sendResetLink(['email' => 'abdulrahman@gmail.com'], function ($user, $token) {
            $token = random_int(111111, 999999);
            DB::table('password_resets')->where('email', 'abdulrahman@gmail.com')->update(['token' => bcrypt($token)]);
            Mail::to($user)->send(new ResetPassword($token));
        });

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'We have emailed your password reset code!'], Response::HTTP_OK)
            : response()->json(['message' => __($status)], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
            'token' => ['required', 'integer']
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ]);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => __($status)], Response::HTTP_OK)
            : response()->json(['message' => __($status)], Response::HTTP_BAD_REQUEST);
    }
}
