<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function __invoke()
    {
        $contactUs = Setting::whereIn('key', ['email', 'phone',])
            ->orWhere('key', 'like', '%_link')
            ->get();

        return $contactUs;
    }
}
