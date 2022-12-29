<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use Illuminate\Http\Response;

class BloodTypeController extends Controller
{
    public function __invoke()
    {
        $bloodTypes = BloodType::select('id', 'name')->get();

        return response()->json([
            'data' => $bloodTypes
        ], Response::HTTP_OK);
    }
}
