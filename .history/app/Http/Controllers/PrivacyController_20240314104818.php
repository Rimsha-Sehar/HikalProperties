<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function privacypolicy()
    {
        return view('privacypolicy.privacypolicy');
    }

}
