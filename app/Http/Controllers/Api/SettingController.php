<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    public function __invoke()
    {
        $settings = Setting::select('key', 'value')->get();

        return response()->json([
            'data' => $settings
        ], Response::HTTP_OK);
    }
}
