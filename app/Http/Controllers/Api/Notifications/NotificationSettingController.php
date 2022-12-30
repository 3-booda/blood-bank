<?php

namespace App\Http\Controllers\Api\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class NotificationSettingController extends Controller
{
    public function index()
    {
        $user = Auth()->user();

        $selectedBloodTypes = $user->favoreBloodyTypes->pluck('id');
        $selectedProvince = $user->favoreProvinces->pluck('id');

        return response()->json([
            'data' => [
                'selected_blood_types' => $selectedBloodTypes,
                'selected_province' => $selectedProvince
            ]
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $sync = DB::transaction(function () use($request) {
            $user = Auth()->user();
            $user->favoreBloodyTypes()->sync($request->selected_blood_types);
            $user->favoreProvinces()->sync($request->selected_province);

            return true;
        });

        return $sync
            ? $this->index()
            : response()->json([
                'message' => 'something went wrong'
            ], Response::HTTP_BAD_REQUEST);
    }
}
