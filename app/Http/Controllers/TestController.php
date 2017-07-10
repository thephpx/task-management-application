<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function test()
    {
        dd(Carbon::today()->toDateString());
    }
}
