<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationController extends Controller
{
    public function __invoke()
    {
        $notifications = auth()->user()->notifications()->paginate(PAGINATE);

        return response()->json([
            'data' => NotificationResource::collection($notifications)
        ], Response::HTTP_OK);
    }
}
