<?php

namespace App\Http\Controllers\Tenant\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function profile()
    {
        return view('tenant.settings.profile');
    }

    public function billing()
    {
        return view('tenant.settings.billing');
    }
}
