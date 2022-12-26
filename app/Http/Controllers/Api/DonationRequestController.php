<?php

namespace App\Http\Controllers\Api;

use App\Events\DontaionRequestCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DonationRequest;
use Illuminate\Http\Response;

class DonationRequestController extends Controller
{
    public function __invoke(DonationRequest $request)
    {
        $donationRequest = \App\Models\DonationRequest::create($request->validated());

        event(new DontaionRequestCreated($donationRequest));

        return response()->json([
            'data' => $donationRequest
        ], Response::HTTP_OK);
    }
}
