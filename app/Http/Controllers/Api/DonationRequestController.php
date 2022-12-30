<?php

namespace App\Http\Controllers\Api;

use App\Events\DontaionRequestCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DonationRequest as DonationValidate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DonationRequest;

class DonationRequestController extends Controller
{
    public function index(Request $request)
    {
        $donationRequests = DonationRequest::query()
            ->when($request->blood_type_id, function ($query) use ($request) {
                $query->where('blood_type_id', $request->blood_type_id);
            })
            ->when($request->province_id, function ($query) use ($request) {
                $query->whereHas('city', function ($query) use ($request) {
                    $query->where('province_id', $request->province_id);
                });
            })
            ->select(['patient_name', 'hospita_address', 'city_id'])
            ->with('city:id,name')
            ->latest()
            ->get();

        return response()->json([
            'data' => $donationRequests
        ], Response::HTTP_OK);
    }

    public function show(DonationRequest $donationRequest)
    {
        return response()->json([
            'data' => $donationRequest
        ], Response::HTTP_OK);
    }

    public function store(DonationValidate $request)
    {
        $donationRequest = DonationRequest::create($request->validated());

        event(new DontaionRequestCreated($donationRequest));

        return response()->json([
            'data' => $donationRequest
        ], Response::HTTP_OK);
    }
}
