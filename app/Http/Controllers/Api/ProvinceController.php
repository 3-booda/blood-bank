<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Response;

class ProvinceController extends Controller
{
    public function __invoke()
    {
        $provinces = Province::select('id', 'name')->paginate(PAGINATE);

        return response()->json([
            'data' => $provinces
        ], Response::HTTP_OK);
    }
}
