<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return response()->json(['data' => $user], Response::HTTP_OK);
    }

    public function update(User $user, ProfileRequest $request)
    {
        $user->update($request->validated());

        return response()->json(['data' => $user], Response::HTTP_OK);
    }
}
