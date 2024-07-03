<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class TokenController extends Controller
{
    public function generate()
    {
        $token = Cache::put(Str::random(12));
    }
}
