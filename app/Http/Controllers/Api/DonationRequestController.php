<?php

namespace App\Http\Controllers\Api;

use App\Events\DontaionRequestCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DonationRequest;
use Illuminate\Http\Response;

class DonationRequestController extends Controller
{
    public function index()
    {
        $donationRequests = \App\Models\DonationRequest::query()
            ->select(['patient_name', 'hospita_address', 'city_id'])
            ->with('city:id,name')
            ->latest()
            ->paginate(PAGINATE);

        return response()->json([
            'data' => $donationRequests
        ], Response::HTTP_OK);
    }

    public function show(\App\Models\DonationRequest $donationRequest)
    {
        return response()->json([
            'data' => $donationRequest
        ], Response::HTTP_OK);
    }

    public function store(DonationRequest $request)
    {
        $donationRequest = \App\Models\DonationRequest::create($request->validated());

        event(new DontaionRequestCreated($donationRequest));

        return response()->json([
            'data' => $donationRequest
        ], Response::HTTP_OK);
    }
}
