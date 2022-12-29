<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Response;

class CityController extends Controller
{
    public function __invoke($province_id)
    {
        $cities = City::where('province_id', $province_id)->paginate(PAGINATE);

        return response()->json([
            'data' => $cities
        ], Response::HTTP_OK);
    }
}
