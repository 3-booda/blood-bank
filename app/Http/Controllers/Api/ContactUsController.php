<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactUsController extends Controller
{
    public function index()
    {
        $contactUs = Setting::whereIn('key', ['email', 'phone',])
            ->orWhere('key', 'like', '%_link')
            ->get();

        return $contactUs;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => ['required', 'string'],
            'message' => ['required', 'string']
        ]);

        Contact::create($validated + ['user_id' => Auth()->user()->id]);

        return response()->json([
            'message' => 'We recived your message we will reply as soon as possible'
        ], Response::HTTP_ACCEPTED);
    }
}
