<?php

namespace App\Http\Controllers;

use App\Company\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TestController extends Controller
{
    public function test()
    {

        dd(resolve(Company::class));


    }
}
