<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Response;

class AboutAppController extends Controller
{
    public function __invoke()
    {
        $aboutApp = Setting::where('key', 'about_app')
            ->select('key', 'value')
            ->get();

        return response()->json([
            'data' => $aboutApp
        ], Response::HTTP_OK);
    }
}
