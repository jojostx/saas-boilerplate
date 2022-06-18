<?php

namespace App\Http\Controllers\Central\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('central.backend.settings');
    }
}
