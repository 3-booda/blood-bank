<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DonationRequest;
use Illuminate\Http\Response;

class DonationRequestController extends Controller
{
    public function __invoke(DonationRequest $request)
    {
        $donationRequest = \App\Models\DonationRequest::create($request->validated());

        return response()->json([
            'data' => $donationRequest
        ], Response::HTTP_OK);
    }
}
