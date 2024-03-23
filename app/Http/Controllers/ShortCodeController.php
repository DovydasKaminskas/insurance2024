<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ShortCode as ShortCodeMiddleware;
use App\Models\ShortCode;
use Illuminate\Http\Request;

class ShortCodeController extends Controller
{
    public function index()
    {
        $short_codes = ShortCode::all();
        return $short_codes;
    }
}
